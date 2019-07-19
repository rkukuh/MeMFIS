<?php

namespace App\Http\Controllers\Frontend\WorkPackage;

use App\Models\TaskCard;
use App\Models\WorkPackage;
use App\Models\Pivots\TaskCardWorkPackage;
use App\Http\Controllers\Controller;
use App\Models\TaskCardWorkPackageSuccessor;
use App\Http\Requests\Frontend\TaskCardWorkPackageSuccessorStore;
use App\Http\Requests\Frontend\TaskCardWorkPackageSuccessorUpdate;

class TaskCardWorkPackageSuccessorController extends Controller
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
     * @param  \App\Http\Requests\Frontend\TaskCardWorkPackageSuccessorStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkPackage $WorkPackage, TaskCard $taskcard,TaskCardWorkPackageSuccessorStore $request)
    {
        $taskcard_workpackage  = TaskCardWorkPackage::where('taskcard_id', $taskcard->id)->where('workpackage_id',$WorkPackage->id)->with('successors')->first();

        $taskcard_workpackage->successors()->create([
            'next' => TaskCard::where('uuid',$request->previous)->first()->id,
            'order' => $request->order,
        ]);

        return response()->json($taskcard_workpackage);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskCardWorkPackageSuccessor  $taskCardWorkPackageSuccessor
     * @return \Illuminate\Http\Response
     */
    public function show(TaskCardWorkPackageSuccessor $taskCardWorkPackageSuccessor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskCardWorkPackageSuccessor  $taskCardWorkPackageSuccessor
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskCardWorkPackageSuccessor $taskCardWorkPackageSuccessor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardWorkPackageSuccessorUpdate  $request
     * @param  \App\Models\TaskCardWorkPackageSuccessor  $taskCardWorkPackageSuccessor
     * @return \Illuminate\Http\Response
     */
    public function update(TaskCardWorkPackageSuccessorUpdate $request, TaskCardWorkPackageSuccessor $taskCardWorkPackageSuccessor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskCardWorkPackageSuccessor  $taskCardWorkPackageSuccessor
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskCardWorkPackageSuccessor $taskCardWorkPackageSuccessor)
    {
        $taskCardWorkPackageSuccessor->delete();

        return response()->json($taskCardWorkPackageSuccessor);
    }
}
