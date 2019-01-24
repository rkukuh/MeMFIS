<?php

namespace App\Http\Controllers\Frontend\TaskCard;

use App\Models\Type;
use App\Models\Zone;
use App\Models\Aircraft;
use App\Models\Access;
use App\Models\TaskCard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TaskCardRoutineStore;
use App\Http\Requests\Frontend\TaskCardRoutineUpdate;

class TaskCardRoutineController extends Controller
{

    protected $type;
    protected $aircraft;
    protected $task;
    protected $skill;
    protected $work_area;
    protected $accesses;
    protected $zones;
    protected $relationship;

    public function __construct()
    {
        $this->aircraft = Aircraft::get();
        $this->accesses = Access::get();
        $this->zones = Zone::get();
        $this->type = Type::ofTaskCardTypeRoutine()->get();
        $this->work_area = Type::ofWorkArea()->get();
        $this->task = Type::ofTaskCardTask()->get();
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
        //
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
        // dd($taskCard);
        $aircraft_taskcards = array();
        foreach($taskCard->aircrafts as $i => $aircraft_taskcard){
            $aircraft_taskcards[$i] =  $aircraft_taskcard->id;
        }
        $access_taskcards = array();
        foreach($taskCard->accesses as $i => $access_taskcard){
            $access_taskcards[$i] =  $access_taskcard->id;
        }
        $zone_taskcards = array();
        foreach($taskCard->zones as $i => $zone_taskcard){
            $zone_taskcards[$i] =  $zone_taskcard->id;
        }

        return view('frontend.taskcard.routine.edit', [
            'taskcard' => $taskCard,
            'types' => $this->type,
            'work_areas' => $this->work_area,
            'tasks' => $this->task,
            'aircrafts' => $this->aircraft,
            'aircraft_taskcards' => $aircraft_taskcards,
            'accesses' => $this->accesses,
            'access_taskcards' => $access_taskcards,
            'zones' => $this->zones,
            'zone_taskcards' => $zone_taskcards,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardRoutineUpdate  $request
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function update(TaskCardRoutineUpdate $request, $taskCard)
    {
        //TODO Data binding not work

        $taskCard = TaskCard::where('uuid',$taskCard)->first();

        // dd($request->all());
        if ($taskCard->update($request->all())) {
            // $item->categories()->sync($request->category);

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
