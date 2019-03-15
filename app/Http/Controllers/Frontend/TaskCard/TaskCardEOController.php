<?php

namespace App\Http\Controllers\Frontend\TaskCard;

use App\Models\Type;
use App\Models\Zone;
use App\Models\Repeat;
use App\Models\Aircraft;
use App\Models\TaskCard;
use App\Models\Category;
use App\Models\Threshold;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TaskCardEOStore;
use App\Http\Requests\Frontend\TaskCardEOUpdate;

class TaskCardEOController extends Controller
{
    protected $type;
    protected $task;
    protected $skill;
    protected $zones;
    protected $aircraft;
    protected $taskcard;
    protected $work_area;
    protected $relationship;
    protected $categories;
    protected $scheduled_priorities;
    protected $affected_manuals;

    public function __construct()
    {
        $this->zones = Zone::get();
        $this->aircraft = Aircraft::get();
        $this->taskcard = TaskCard::get();
        $this->task = Type::ofTaskCardTask()->get();
        $this->work_area = Type::ofWorkArea()->get();
        $this->type = Type::ofTaskCardTypeNonRoutine()->get();
        $this->categories = Category::ofTaskCardEO()->get();
        $this->recurrences = Type::ofTaskCardEORecurrence()->get();
        $this->scheduled_priorities = Type::ofTaskCardEOScheduledPriority()->get();
        $this->affected_manuals = Type::ofTaskCardEOManualAffected()->get();
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
        return view('frontend.taskcard.nonroutine.eo.create', [
            'MaintenanceCycles' => $this->maintenanceCycle,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardEOStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCardEOStore $request)
    {
        if ($taskcard = TaskCard::create($request->all())) {
            $taskcard->aircrafts()->attach($request->applicability_airplane);
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
        return view('frontend.taskcard.nonroutine.eo.show',[
            'taskcard' => $taskCard
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function edit(Taskcard $taskCard)
    {
        $aircraft_taskcards = [];

        foreach($taskCard->aircrafts as $i => $aircraft_taskcard){
            $aircraft_taskcards[$i] =  $aircraft_taskcard->id;
        }

        $relation_taskcards = [];

        foreach($taskCard->related_to as $i => $relation_taskcard){
            $relation_taskcards[$i] =  $relation_taskcard->id;
        }
        
        return view('frontend.taskcard.nonroutine.eo.edit',[
            'tasks' => $this->task,
            'types' => $this->type,
            'taskCard' => $taskCard,
            'taskcards' => $this->taskcard,
            'aircrafts' => $this->aircraft,
            'categories' => $this->categories,
            'recurrences' => $this->recurrences,
            'aircraft_taskcards' => $aircraft_taskcards,
            'relation_taskcards' => $relation_taskcards,
            'scheduled_priorities' => $this->scheduled_priorities,
            'affected_manuals' => $this->affected_manuals,
            'MaintenanceCycles' => $this->maintenanceCycle,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardEOUpdate  $request
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function update(TaskCardEOUpdate $request, Taskcard $taskCard)
    {
        if ($taskCard->update($request->all())) {
            $taskCard->aircrafts()->sync($request->applicability_airplane);
            $taskCard->related_to()->sync($request->relationship);
            $taskCard->thresholds()->delete();
            $taskCard->repeats()->delete();
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
