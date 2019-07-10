<?php

namespace App\Http\Controllers\Frontend\WorkPackage;

use App\Models\TaskCard;
use App\Models\WorkPackage;
use App\Models\Pivots\TaskCardWorkPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuccessorController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\TaskCard  $taskcard
     * @param  \App\Models\WorkPackage  $WorkPackage
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addSuccessor(WorkPackage $WorkPackage, TaskCard $taskcard, Request $request){
        $successors  = TaskCardWorkPackage::where('taskcard_id', $taskcard->id)->where('workpackage_id',$WorkPackage->id)->with('successors')->first();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskCard  $taskcard
     * @param  \App\Models\WorkPackage  $WorkPackage
     * @return \Illuminate\Http\Response
     */
    public function deleteSuccessor(WorkPackage $WorkPackage, TaskCard $taskcard){
        $successors  = TaskCardWorkPackage::where('taskcard_id', $taskcard->id)->where('workpackage_id',$WorkPackage->id)->with('successors')->first();
    
    }
}
