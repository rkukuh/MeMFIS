<?php

namespace App\Http\Controllers\Frontend\TaskCard;

use App\Models\TaskCard;
use App\Models\Threshold;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TaskCardRoutineMaintenanceCycleStore;
use App\Http\Requests\Frontend\TaskCardRoutineMaintenanceCycleUpdate;

class TaskCardRoutineThresholdController extends Controller
{

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardRoutineItemStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCard $taskcard, TaskCardRoutineMaintenanceCycleStore $request)
    {

        $taskcard->thresholds()->attach([$request->type_id,$request->amount]);

        return response()->json($taskcard);
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
    public function edit(TaskCard $taskCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardRoutineItemUpdate  $request
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function update(TaskCardRoutineMaintenanceCycleUpdate $request, TaskCard $taskCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taskcard $taskcard, Threshold $threshold)
    {
        $taskcard->thresholds()->detach($threshold);

        return response()->json($taskcard);
    }
}
