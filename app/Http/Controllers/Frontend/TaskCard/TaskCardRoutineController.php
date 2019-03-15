<?php

namespace App\Http\Controllers\Frontend\TaskCard;

use App\Models\Type;
use App\Models\Zone;
use App\Models\Access;
use App\Models\Aircraft;
use App\Models\TaskCard;
use App\Models\Threshold;
use App\Models\Repeat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TaskCardRoutineStore;
use App\Http\Requests\Frontend\TaskCardRoutineUpdate;

class TaskCardRoutineController extends Controller
{

    protected $type;
    protected $task;
    protected $skill;
    protected $zones;
    protected $access;
    protected $aircraft;
    protected $taskcard;
    protected $work_area;
    protected $relationship;

    public function __construct()
    {
        $this->zones = Zone::get();
        $this->access = Access::get();
        $this->aircraft = Aircraft::get();
        $this->taskcard = TaskCard::get();
        $this->skill = Type::ofTaskCardSkill()->get();
        $this->task = Type::ofTaskCardTask()->get();
        $this->work_area = Type::ofWorkArea()->get();
        $this->type = Type::ofTaskCardTypeRoutine()->get();
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
        return view('frontend.taskcard.routine.create', [
            'MaintenanceCycles' => $this->maintenanceCycle,
        ]);

        // return view('frontend.taskcard.routine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardRoutineStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCardRoutineStore $request)
    {
        // dd(Type::where('uuid',$request->threshold_type[1])->first()->id );
        $accesses = [];
        $zones = [];
        $request->work_area = Type::firstOrCreate(
            ['name' => $request->work_area,'code' => strtolower(str_replace(" ","-",$request->work_area) ),'of' => 'work-area' ]
        );
        foreach ($request->access as $access_name ) {
            foreach ($request->applicability_airplane as $airplane) {
                $access = Access::firstOrCreate(
                    ['name' => $access_name, 'accessable_id' => $airplane, 'accessable_type' => 'App\Models\Aircraft']
                );
                array_push($accesses, $access->id);
            }
        }
        foreach ($request->zone as $zone_name ) {
            foreach ($request->applicability_airplane as $airplane) {
                $zone = Zone::firstOrCreate(
                    ['name' => $zone_name, 'zoneable_id' => $airplane, 'zoneable_type' => 'App\Models\Aircraft']
                );
                array_push($zones, $zone->id);
            }
        }
        if ($taskcard = TaskCard::create($request->all())) {
            $taskcard->aircrafts()->attach($request->applicability_airplane);
            $taskcard->accesses()->attach($accesses);
            $taskcard->zones()->attach($zones);
            $taskcard->related_to()->attach($request->relationship);
            for ($i=0; $i < sizeof($request->threshold_amount) ; $i++) { 
                $taskcard->thresholds()->save(new Threshold([
                    'type_id' => Type::where('uuid',$request->threshold_type[$i])->first()->id,
                    'amount' => $request->threshold_amount[$i],
                ]));
            }
            for ($i=0; $i < sizeof($request->repeat_amount) ; $i++) { 
                $taskcard->repeats()->save(new Repeat([
                    'type_id' => Type::where('uuid',$request->repeat_type[$i])->first()->id,
                    'amount' => $request->repeat_amount[$i],
                ]));
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
        $aircraft_taskcards = [];

        foreach($taskCard->aircrafts as $i => $aircraft_taskcard){
            $aircraft_taskcards[$i] =  $aircraft_taskcard->id;
        }

        $access_taskcards = [];

        foreach($taskCard->accesses as $i => $access_taskcard){
            $access_taskcards[$i] =  $access_taskcard->pivot->access_id;
        }

        $zone_taskcards = [];

        foreach($taskCard->zones as $i => $zone_taskcard){
            $zone_taskcards[$i] =  $zone_taskcard->id;
        }

        $relation_taskcards = [];

        foreach($taskCard->related_to as $i => $relation_taskcard){
            $relation_taskcards[$i] =  $relation_taskcard->pivot->related_to;
        }

        return view('frontend.taskcard.routine.show', [
            'taskcard' => $taskCard,
            'types' => $this->type,
            'work_areas' => $this->work_area,
            'tasks' => $this->task,
            'aircrafts' => $this->aircraft,
            'aircraft_taskcards' => $aircraft_taskcards,
            'accesses' => $this->access,
            'access_taskcards' => $access_taskcards,
            'zones' => $this->zones,
            'zone_taskcards' => $zone_taskcards,
            'taskcards' => $this->taskcard,
            'relation_taskcards' => $relation_taskcards,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskCard $taskCard)
    {
        $aircraft_taskcards = [];

        foreach($taskCard->aircrafts as $i => $aircraft_taskcard){
            $aircraft_taskcards[$i] =  $aircraft_taskcard->id;
        }

        $access_taskcards = [];

        foreach($taskCard->accesses as $i => $access_taskcard){
            $access_taskcards[$i] =  $access_taskcard->pivot->access_id;
        }

        $zone_taskcards = [];

        foreach($taskCard->zones as $i => $zone_taskcard){
            $zone_taskcards[$i] =  $zone_taskcard->id;
        }

        $relation_taskcards = [];

        foreach($taskCard->related_to as $i => $relation_taskcard){
            $relation_taskcards[$i] =  $relation_taskcard->pivot->related_to;
        }

        return view('frontend.taskcard.routine.edit', [
            'taskcard' => $taskCard,
            'aircraft_taskcards' => $aircraft_taskcards,
            'access_taskcards' => $access_taskcards,
            'zone_taskcards' => $zone_taskcards,
            'relation_taskcards' => $relation_taskcards,
            'types' => $this->type,
            'work_areas' => $this->work_area,
            'tasks' => $this->task,
            'aircrafts' => $this->aircraft,
            'accesses' => $this->access,
            'zones' => $this->zones,
            'skills' => $this->skill,
            'taskcards' => $this->taskcard,
            'MaintenanceCycles' => $this->maintenanceCycle,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardRoutineUpdate  $request
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function update(TaskCardRoutineUpdate $request, TaskCard $taskCard)
    {
        if ($taskCard->update($request->all())) {
            $taskCard->aircrafts()->sync($request->applicability_airplane);
            $taskCard->accesses()->sync($request->access);
            $taskCard->zones()->sync($request->zone);
            $taskCard->related_to()->sync($request->relationship);
            if($taskCard->thresholds)$taskCard->thresholds()->delete();
            if($taskCard->repeats) $taskCard->repeats()->delete();
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
