<?php

namespace App\Http\Controllers\Frontend\TaskCard;

use App\Models\Type;
use App\Models\Repeat;
use App\Models\Aircraft;
use App\Models\TaskCard;
use App\Models\Threshold;
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
        return view('frontend.taskcard.nonroutine.si.create', [
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
        $request->work_area = Type::firstOrCreate(
            ['name' => $request->work_area,'code' => strtolower(str_replace(" ","-",$request->work_area) ),'of' => 'work-area' ]
        );
        if ($taskcard = TaskCard::create($request->all())) {
            $taskcard->aircrafts()->attach($request->applicability_airplane);
            for ($i=0; $i < sizeof($request->threshold_amount) ; $i++) {
                if($request->threshold_type[$i] !== "Select Threshold"){
                    $taskcard->thresholds()->save(new Threshold([
                        'type_id' => Type::where('uuid',$request->threshold_type[$i])->first()->id,
                        'amount' => $request->threshold_amount[$i],
                    ]));
                }
            }
            for ($i=0; $i < sizeof($request->repeat_amount) ; $i++) {
                if($request->repeat_type[$i] !== "Select Repeat"){
                    $taskcard->repeats()->save(new Repeat([
                        'type_id' => Type::where('uuid',$request->repeat_type[$i])->first()->id,
                        'amount' => $request->repeat_amount[$i],
                    ]));
                }
            }

            return response()->json($taskcard);
        }

        // TODO: Return error message as JSON
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function show(TaskCard $taskCard)
    {
        return view('frontend.taskcard.nonroutine.si.show',[
            'taskCard' => $taskCard
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
        return view('frontend.taskcard.nonroutine.si.edit', [
            'taskcard' => $taskCard,
            'skills' => $this->skill,
            'work_areas' => $this->work_area,
            'aircrafts' => $this->aircraft,
            'aircraft_taskcards' => $aircraft_taskcards,
            'MaintenanceCycles' => $this->maintenanceCycle,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardSIUpdate  $request
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function update(TaskCardSIUpdate $request,$taskCard)
    {
        //TODO Data binding not work

        $taskCard = TaskCard::where('uuid',$taskCard)->first();

        if ($taskCard->update($request->all())) {
            $taskCard->aircrafts()->sync($request->applicability_airplane);
            if($taskCard->thresholds)$taskCard->thresholds()->delete();
            if($taskCard->repeats)$taskCard->repeats()->delete();
            for ($i=0; $i < sizeof($request->threshold_amount) ; $i++) {
                $taskCard->thresholds()->save(new Threshold([
                    'type_id' => Type::where('uuid',$request->threshold_type[$i])->first()->id,
                    'amount' => $request->threshold_amount[$i],
                ]));
            }
            for ($i=0; $i < sizeof($request->repeat_amount) ; $i++) {
                $taskCard->repeats()->save(new Repeat([
                    'type_id' => Type::where('uuid',$request->repeat_type[$i])->first()->id,
                    'amount' => $request->repeat_amount[$i],
                ]));
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
}
