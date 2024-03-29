<?php

namespace App\Http\Controllers\Frontend\TaskCard;

use App\Models\Repeat;
use App\Models\TaskCard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TaskCardRoutineMaintenanceCycleStore;
use App\Http\Requests\Frontend\TaskCardRoutineMaintenanceCycleUpdate;

class TaskCardRoutineRepeatController extends Controller
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
        $repeat = new Repeat(['type_id' => $request->type_id, 'amount' => $request->amount]);
        $taskcard = $taskcard->repeats()->save($repeat);

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
    public function destroy(Taskcard $taskcard, Repeat $repeat)
    {
        $taskcard->repeats()->delete($repeat);

        return response()->json($taskcard);
    }
}
