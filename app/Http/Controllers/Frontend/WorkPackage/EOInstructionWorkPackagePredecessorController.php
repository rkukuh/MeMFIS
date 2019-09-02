<?php

namespace App\Http\Controllers\Frontend\WorkPackage;

use App\Models\TaskCard;
use App\Models\EOInstruction;
use App\Models\WorkPackage;
use App\Models\Pivots\EOInstructionWorkPackage;
use App\Http\Controllers\Controller;
use App\Models\EOInstructionWorkPackagePredecessor;
use App\Http\Requests\Frontend\TaskCardWorkPackagePredecessorStore;
use App\Http\Requests\Frontend\TaskCardWorkPackagePredecessorUpdate;

class EOInstructiondWorkPackagePredecessorController extends Controller
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
    public function store(WorkPackage $WorkPackage, EOInstruction $instruction,TaskCardWorkPackagePredecessorStore $request)
    {
        $instruction_workpackage  = EOInstructionWorkPackage::where('eo_instruction_id', $instruction->id)->where('workpackage_id',$WorkPackage->id)->with('predecessors')->first();

        $instruction_workpackage->predecessors()->create([
            'previous' => TaskCard::where('uuid',$request->previous)->first()->id,
            'order' => $request->order,
        ]);

        return response()->json($instruction_workpackage);
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
    public function destroy(EOInstructionWorkPackagePredecessor $EOIWorkPackagePredecessor)
    {
        $EOIWorkPackagePredecessor->delete();

        return response()->json($EOIWorkPackagePredecessor);
    }
}
