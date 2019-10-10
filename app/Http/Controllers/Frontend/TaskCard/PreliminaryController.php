<?php

namespace App\Http\Controllers\Frontend\TaskCard;

use App\Models\Type;
use App\Models\Repeat;
use App\Models\Aircraft;
use App\Models\TaskCard;
use App\Models\Threshold;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PreliminaryStore;
use App\Http\Requests\Frontend\PreliminaryUpdate;

class PreliminaryController extends Controller
{
    protected $aircraft;
    protected $skill;

    public function __construct()
    {
        $this->aircraft = Aircraft::get();
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
        return view('frontend.task-card.nonroutine.preliminary.create', [
            'MaintenanceCycles' => $this->maintenanceCycle,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardSIStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PreliminaryStore $request)
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
            $additionals["internal_number"] = $request->additionals->internal_number;
            $additionals["document_library"] = $request->document_library;
            $request->merge(['additionals' => json_encode($additionals, true)]);

            if ($taskcard = TaskCard::create($request->all())) {
                $taskcard->aircrafts()->attach($request->applicability_airplane);

                return response()->json($taskcard);
            }
        }

        if(in_array(true, $checker)){
            $error_message = array(
                'message' => "a taskcard with same number and company number already exists",
                'title' => "Taskcard already exists!",
                'alert-type' => "error"
            );
            return response()->json(['error' => [$error_message]], '403');
        }else{
            $additionals["internal_number"] = $request->additionals->internal_number;
            $additionals["document_library"] = $request->document_library;
            $request->merge(['additionals' => json_encode($additionals, true)]);

            if ($taskcard = TaskCard::create($request->all())) {
                $taskcard->aircrafts()->attach($request->applicability_airplane);

                return response()->json($taskcard);
            }
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
        return view('frontend.task-card.nonroutine.preliminary.show',[
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
        return view('frontend.task-card.nonroutine.preliminary.edit', [
            'taskcard' => $taskCard,
            'skills' => $this->skill,
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
    public function update(PreliminaryUpdate $request, $taskCard)
    {
        //TODO Data binding not work

        $this->decoder($request);

        $taskCard = TaskCard::where('uuid',$taskCard)->first();
        if ($taskCard->update($request->all())) {
            $taskCard->aircrafts()->sync($request->applicability_airplane);

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
}
