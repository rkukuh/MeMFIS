<?php

namespace App\Http\Controllers\Frontend\TaskCard;

use App\Models\Type;
use App\Models\Zone;
use App\Models\Access;
use App\Models\Aircraft;
use App\Models\TaskCard;
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
        $this->task = Type::ofTaskCardTask()->get();
        $this->work_area = Type::ofWorkArea()->get();
        $this->type = Type::ofTaskCardTypeRoutine()->get();
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
        return view('frontend.taskcard.routine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardRoutineStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCardRoutineStore $request)
    {
        if ($taskcard = TaskCard::create($request->all())) {
            $taskcard->aircrafts()->attach($request->applicability_airplane);
            $taskcard->accesses()->attach($request->access);
            $taskcard->zones()->attach($request->zone);
            $taskcard->related_to()->attach($request->relationship);

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
        return view('frontend.taskcard.routine.show');
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
