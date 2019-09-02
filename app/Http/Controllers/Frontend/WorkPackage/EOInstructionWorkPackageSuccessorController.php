<?php

namespace App\Http\Controllers\Frontend\WorkPackage;

use App\Models\TaskCard;
use App\Models\EOInstruction;
use App\Models\WorkPackage;
use App\Models\Pivots\EOInstructionWorkPackage;
use App\Http\Controllers\Controller;
use App\Models\EOInstructionWorkPackageSuccessor;
use App\Http\Requests\Frontend\TaskCardWorkPackageSuccessorStore;
use App\Http\Requests\Frontend\TaskCardWorkPackageSuccessorUpdate;

class EOInstructionWorkPackageSuccessorController extends Controller
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
    public function store(WorkPackage $WorkPackage, EOInstruction $instruction,TaskCardWorkPackageSuccessorStore $request)
    {
        $instruction_workpackage  = EOInstructionWorkPackage::where('eo_instruction_id', $instruction->id)->where('workpackage_id',$WorkPackage->id)->with('successors')->first();

        $instruction_workpackage->successors()->create([
            'next' => TaskCard::where('uuid',$request->previous)->first()->id,
            'order' => $request->order,
        ]);

        return response()->json($instruction_workpackage);
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
    public function destroy(EOInstructionWorkPackageSuccessor $EOIWorkPackageSuccessor)
    {
        $EOIWorkPackageSuccessor->delete();

        return response()->json($EOIWorkPackageSuccessor);
    }
}
