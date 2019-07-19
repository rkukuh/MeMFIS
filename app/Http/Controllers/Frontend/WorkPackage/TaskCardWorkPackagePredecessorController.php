<?php

namespace App\Http\Controllers\Frontend\WorkPackage;

use App\Models\TaskCard;
use App\Models\WorkPackage;
use App\Models\Pivots\TaskCardWorkPackage;
use App\Http\Controllers\Controller;
use App\Models\TaskCardWorkPackagePredecessor;
use App\Http\Requests\Frontend\TaskCardWorkPackagePredecessorStore;
use App\Http\Requests\Frontend\TaskCardWorkPackagePredecessorUpdate;

class TaskCardWorkPackagePredecessorController extends Controller
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
     * @param  \App\Http\Requests\Frontend\TaskCardWorkPackagePredecessorStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkPackage $WorkPackage, TaskCard $taskcard,TaskCardWorkPackagePredecessorStore $request)
    {
        $taskcard_workpackage  = TaskCardWorkPackage::where('taskcard_id', $taskcard->id)->where('workpackage_id',$WorkPackage->id)->with('predecessors')->first();

        $taskcard_workpackage->predecessors()->create([
            'previous' => TaskCard::where('uuid',$request->previous)->first()->id,
            'order' => $request->order,
        ]);

        return response()->json($taskcard_workpackage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskCardWorkPackagePredecessor  $taskCardWorkPackagePredecessor
     * @return \Illuminate\Http\Response
     */
    public function show(TaskCardWorkPackagePredecessor $taskCardWorkPackagePredecessor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskCardWorkPackagePredecessor  $taskCardWorkPackagePredecessor
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskCardWorkPackagePredecessor $taskCardWorkPackagePredecessor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardWorkPackagePredecessorUpdate  $request
     * @param  \App\Models\TaskCardWorkPackagePredecessor  $taskCardWorkPackagePredecessor
     * @return \Illuminate\Http\Response
     */
    public function update(TaskCardWorkPackagePredecessorUpdate $request, TaskCardWorkPackagePredecessor $taskCardWorkPackagePredecessor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskCardWorkPackagePredecessor  $taskCardWorkPackagePredecessor
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskCardWorkPackagePredecessor $taskCardWorkPackagePredecessor)
    {
        $taskCardWorkPackagePredecessor->delete();

        return response()->json($taskCardWorkPackagePredecessor);
    }
}
