<?php

namespace App\Http\Controllers\Frontend\WorkPackage;

use App\Models\TaskCard;
use App\Models\WorkPackage;
use App\Models\Pivots\TaskCardWorkPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PredecessorController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Models\TaskCard  $taskcard
     * @param  \App\Models\WorkPackage  $WorkPackage
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function addPredecessor(WorkPackage $WorkPackage, TaskCard $taskcard, Request $request){
        $predecessors  = TaskCardWorkPackage::where('taskcard_id', $taskcard->id)->where('workpackage_id',$WorkPackage->id)->with('predecessors')->first();
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskCard  $taskcard
     * @param  \App\Models\WorkPackage  $WorkPackage
     * @return \Illuminate\Http\Response
     */
    public function deletePredecessor(WorkPackage $WorkPackage, TaskCard $taskcard){
        $predecessors  = TaskCardWorkPackage::where('taskcard_id', $taskcard->id)->where('workpackage_id',$WorkPackage->id)->with('predecessors')->first();
    
    }

}
