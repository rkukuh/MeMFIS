<?php

namespace App\Http\Controllers\Frontend\TaskCard;

use App\Models\Type;
use App\Models\Repeat;
use App\Models\Aircraft;
use App\Models\TaskCard;
use App\Models\Threshold;
use Illuminate\Support\Facades\Storage;
use App\Helpers\DocumentNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TaskCardSIStore;
use App\Http\Requests\Frontend\TaskCardSIUpdate;

class TaskCardSIController extends Controller
{
    protected $aircraft;
    protected $skill;
    protected $work_area;

    public function __construct()
    {
        $this->aircraft = Aircraft::get();
        $this->work_area = Type::ofWorkArea()->get();
        $this->skill = Type::ofTaskCardSkill()->get();
        $this->maintenanceCycle = Type::ofMaintenanceCycle()->get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.task-card.nonroutine.si.create', [
            'MaintenanceCycles' => $this->maintenanceCycle,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardSIStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCardSIStore $request)
    {
        $this->decoder($request);
        $checker = [];
        // get all the taskcard with the same number
        $taskcards = TaskCard::where('number', $request->number)->get();
        if(sizeof($taskcards) > 0){
            // to check all internal number every taskcard
            foreach($taskcards as $taskcard){
                $taskcard->additionals = json_decode($taskcard->additionals);
                // check if the internal number are the same 
                if($request->additionals->internal_number == $taskcard->additionals->internal_number){
                array_push($checker, true);
                }else{
                array_push($checker, false);
                }
            }  
        }else{
            
            $taskcard = $this->createTaskcard($request);

            return response()->json($taskcard->original);
        }

        if(in_array(true, $checker)){
            $error_message = array(
                'message' => "a taskcard with same number and company number already exists",
                'title' => "Taskcard already exists!",
                'alert-type' => "error"
            );
            return response()->json(['error' => [$error_message]], '403');
        }else{
            $taskcard = $this->createTaskcard($request);

            return response()->json($taskcard->original);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function show(TaskCard $taskCard)
    {
        return view('frontend.task-card.nonroutine.si.show',[
            'taskCard' => $taskCard,
            'additionals' => json_decode($taskCard->additionals)

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function edit($taskCard)
    {
        //TODO Data binding not work
        $taskCard = TaskCard::where('uuid',$taskCard)->first();
        $aircraft_taskcards = array();
        foreach($taskCard->aircrafts as $i => $aircraft_taskcard){
            $aircraft_taskcards[$i] =  $aircraft_taskcard->id;
        }

        return view('frontend.task-card.nonroutine.si.edit', [
            'taskcard' => $taskCard,
            'skills' => $this->skill,
            'work_areas' => $this->work_area,
            'aircrafts' => $this->aircraft,
            'aircraft_taskcards' => $aircraft_taskcards,
            'MaintenanceCycles' => $this->maintenanceCycle,
            'additionals' => json_decode($taskCard->additionals)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardSIUpdate  $request
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function update(TaskCardSIUpdate $request, $taskCard)
    {
        //TODO Data binding not work

        $this->decoder($request);

        $additionals["internal_number"] = $request->additionals->internal_number;
        $additionals["document_library"] = $request->document_library;
        $request->merge(['additionals' => json_encode($additionals, true)]);

        $taskCard = TaskCard::where('uuid',$taskCard)->first();
        if($request->work_area){
            $request->work_area = Type::firstOrCreate(
                ['name' => $request->work_area,'code' => strtolower(str_replace(" ","-",$request->work_area) ),'of' => 'work-area' ]
            );
        }

        if ($taskCard->update($request->all())) {
            if(Type::where('id',$request->skill_id)->first()->code == 'eri'){
                $taskCard->skills()->detach();
                $taskCard->skills()->attach(Type::where('code','electrical')->first()->id);
                $taskCard->skills()->attach(Type::where('code','radio')->first()->id);
                $taskCard->skills()->attach(Type::where('code','instrument')->first()->id);
            }
            else{
                if(sizeof($taskCard->skills) > 1 ){
                    $taskCard->skills()->detach();
                }
                $taskCard->skills()->sync($request->skill_id);
            }
            $taskCard->aircrafts()->sync($request->applicability_airplane);
            if($taskCard->thresholds)$taskCard->thresholds()->delete();
            if($taskCard->repeats)$taskCard->repeats()->delete();
            if(is_array($request->threshold_amount)){
                for ($i=0; $i < sizeof($request->threshold_amount) ; $i++) {
                    if($request->threshold_type[$i] !== "Select Threshold"){
                        $taskCard->thresholds()->save(new Threshold([
                            'type_id' => Type::where('uuid',$request->threshold_type[$i])->first()->id,
                            'amount' => $request->threshold_amount[$i],
                            ]));
                        }
                    }
                }

            if(is_array($request->repeat_amount)){
                for ($i=0; $i < sizeof($request->repeat_amount) ; $i++) {
                    if($request->repeat_type[$i] !== "Select Repeat"){
                        $taskCard->repeats()->save(new Repeat([
                            'type_id' => Type::where('uuid',$request->repeat_type[$i])->first()->id,
                            'amount' => $request->repeat_amount[$i],
                            ]));
                        }
                    }
                }

            if ($request->hasFile('fileInput')) {
                $data = $request->input('image');
                $photo = $request->file('fileInput')->getClientOriginalName();
                $destination = 'master/taskcard/non-routine/';
                $stat = Storage::putFileAs($destination,$request->file('fileInput'), $photo);
            }

            return response()->json($taskCard);
        }

        // TODO: Return error message as JSON
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taskcard $taskCard)
    {
        //
    }

    public function decoder($req){

        $req->additionals = json_decode($req->additionals);
        $req->repeat_type = json_decode($req->repeat_type);
        $req->repeat_amount = json_decode($req->repeat_amount);
        $req->threshold_type = json_decode($req->threshold_type);
        $req->threshold_amount = json_decode($req->threshold_amount);
        $req->document_library = json_decode($req->document_library);
        $req->applicability_airplane = json_decode($req->applicability_airplane);

        return $req;
    }

    public function createTaskcard($request){

        $additionals["internal_number"] = $request->additionals->internal_number;
        $additionals["document_library"] = $request->document_library;
        $request->merge(['additionals' => json_encode($additionals, true)]);

        if($request->work_area){
            $request->work_area = Type::firstOrCreate(
                ['name' => $request->work_area,'code' => strtolower(str_replace(" ","-",$request->work_area) ),'of' => 'work-area' ]
            );
        }

        if ($taskcard = TaskCard::create($request->all())) {
            $taskcard->aircrafts()->attach($request->applicability_airplane);

            if(Type::where('id',$request->skill_id)->first()->code == 'eri'){
                $taskcard->skills()->attach(Type::where('code','electrical')->first()->id);
                $taskcard->skills()->attach(Type::where('code','radio')->first()->id);
                $taskcard->skills()->attach(Type::where('code','instrument')->first()->id);
            }
            else{
                $taskcard->skills()->attach($request->skill_id);
            }

            if(is_array($request->threshold_type)){
            for ($i=0; $i < sizeof($request->threshold_type) ; $i++) {
                if($request->threshold_type[$i] !== "Select Threshold"){
                    if($request->threshold_amount[$i] == ''){
                        $request->threshold_amount[$i] = null;
                    }
                    $taskcard->thresholds()->save(new Threshold([
                        'type_id' => Type::where('uuid',$request->threshold_type[$i])->first()->id,
                        'amount' => $request->threshold_amount[$i],
                        ]));
                    }
                }
            }

            if(is_array($request->repeat_type)){
            for ($i=0; $i < sizeof($request->repeat_type) ; $i++) {
                if($request->repeat_type[$i] !== "Select Repeat"){
                    if($request->repeat_amount[$i] == ''){
                        $request->repeat_amount[$i] = null;
                    }
                    $taskcard->repeats()->save(new Repeat([
                        'type_id' => Type::where('uuid',$request->repeat_type[$i])->first()->id,
                        'amount' => $request->repeat_amount[$i],
                        ]));
                    }
                }
            }

            if ($request->hasFile('fileInput')) {
                $data = $request->input('image');
                $photo = $request->file('fileInput')->getClientOriginalName();
                $destination = 'master/taskcard/non-routine/';
                $stat = Storage::putFileAs($destination,$request->file('fileInput'), $photo);
            }

            return response()->json($taskcard);
        }

        // TODO: Return error message as JSON
        return false;
    }
}
