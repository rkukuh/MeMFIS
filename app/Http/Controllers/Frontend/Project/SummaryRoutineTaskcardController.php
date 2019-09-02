<?php

namespace App\Http\Controllers\Frontend\Project;

use App\Models\Aircraft;
use App\Models\Project;
use App\Models\ListUtil;
use App\Models\WorkPackage;
use App\Models\Pivots\ProjectWorkPackage;
use App\Models\TaskCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\WorkPackageStore;
use App\Http\Requests\Frontend\WorkPackageUpdate;

class SummaryRoutineTaskcardController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function basic(Project $project, WorkPackage $workPackage)
    {
        $eri = 0;
        $skills = $subset = $taskcards = [];

        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)
        ->where('workpackage_id',$workPackage->id)
        ->with('taskcards')
        ->first();

        foreach($project_workpackage->taskcards as $taskcard){
            array_push($taskcards, $taskcard->taskcard_id);
        }

        $taskcards = TaskCard::whereIn('id',$taskcards)->get(); 
        $taskcards = $taskcards->load('type')->where('type.name', 'Basic');

        foreach($taskcards as $taskcard){
            if (sizeof($taskcard->skills) > 1) {
                $eri++;
            }else{
                $result = $taskcard->skills->map(function ($skills) {
                    return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
                });

                array_push($subset, $result);
            }
        }

        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }

        $otr = array_count_values($skills);
        $otr["eri"] = $eri;
        $total_taskcard  = $taskcards->load('type')->where('type.name', 'Basic')->count('uuid');
        $total_manhour_taskcard  = $taskcards->load('type')->where('type.name', 'Basic')->sum('estimation_manhour');
        $type = 'Basic';
        
        return view('frontend.project.hm.taskcard.routine.basic.basic-summary',[
            'otr' => $otr,
            'type' => $type,
            'project' => $project,
            'workPackage' => $workPackage,
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function cpcp(Project $project, WorkPackage $workPackage)
    {
        $eri = 0;
        $skills = $subset = $taskcards = [];

        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)
        ->where('workpackage_id',$workPackage->id)
        ->with('taskcards')
        ->first();

        foreach($project_workpackage->taskcards as $taskcard){
            array_push($taskcards, $taskcard->taskcard_id);
        }

        $taskcards = TaskCard::whereIn('id',$taskcards)->get(); 
        $taskcards = $taskcards->load('type')->where('type.name', 'CPCP');
        
        foreach($taskcards as $taskcard){
            if (sizeof($taskcard->skills) > 1) {
                $eri++;
            }else{
                $result = $taskcard->skills->map(function ($skills) {
                    return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
                });

                array_push($subset, $result);
            }
        }

        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }

        $otr = array_count_values($skills);
        $otr["eri"] = $eri;
        $total_taskcard  = $taskcards->load('type')->where('type.name', 'CPCP')->count('uuid');
        $total_manhour_taskcard  = $taskcards->load('type')->where('type.name', 'CPCP')->sum('estimation_manhour');
        $type = 'CPCP';

        return view('frontend.project.hm.taskcard.routine.cpcp.cpcp-summary',[
            'otr' => $otr,
            'type' => $type,
            'project' => $project,
            'workPackage' => $workPackage,
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function sip(Project $project, WorkPackage $workPackage)
    {
        $eri = 0;
        $skills = $subset = $taskcards = [];
        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)
        ->where('workpackage_id',$workPackage->id)
        ->with('taskcards')
        ->first();

        foreach($project_workpackage->taskcards as $taskcard){
            array_push($taskcards, $taskcard->taskcard_id);
        }

        $taskcards = TaskCard::whereIn('id',$taskcards)->get(); 
        $taskcards = $taskcards->load('type')->where('type.name', 'SIP');

        foreach($taskcards as $taskcard){
            if (sizeof($taskcard->skills) > 1) {
                $eri++;
            }else{
                $result = $taskcard->skills->map(function ($skills) {
                    return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
                });

                array_push($subset, $result);
            }
        }

        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }

        $otr = array_count_values($skills);
        $otr["eri"] = $eri;
        $total_taskcard  = $taskcards->load('type')->where('type.name', 'SIP')->count('uuid');
        $total_manhour_taskcard  = $taskcards->load('type')->where('type.name', 'SIP')->sum('estimation_manhour');
        $type = 'SIP';
        return view('frontend.project.hm.taskcard.routine.sip.sip-summary',[
            'otr' => $otr,
            'type' => $type,
            'project' => $project,
            'workPackage' => $workPackage,
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function summary(Project $project, WorkPackage $workPackage)
    {
        $eri = 0;
        $skills = $subset = $taskcards = [];
        
        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)
        ->where('workpackage_id',$workPackage->id)
        ->with('taskcards')
        ->first();
        foreach($project_workpackage->taskcards as $taskcard){
            array_push($taskcards, $taskcard->taskcard_id);
        }

        $taskcards = TaskCard::whereIn('id',$taskcards)->where('type.name', 'Basic')->get(); 
        $taskcards = TaskCard::whereIn('id',$taskcards)->where('type.name', 'CPCP')->get(); 
        $taskcards = TaskCard::whereIn('id',$taskcards)->where('type.name', 'SIP')->get(); 

        $basic = TaskCard::whereIn('id',$taskcards)->where('type.name', 'Basic')->count(); 
        $sip = TaskCard::whereIn('id',$taskcards)->where('type.name', 'CPCP')->count(); 
        $cpcp = TaskCard::whereIn('id',$taskcards)->where('type.name', 'SIP')->count(); 

        // foreach($workPackage->taskcards->load('type')->where('type.name', 'Basic') as $taskcard){
        //     $result = $taskcard->skills->map(function ($skills) {
        //         return collect($skills->toArray())
        //             ->only(['code'])
        //             ->all();
        //     });

        //     array_push($subset , $result);
        // }
        
        // $basic = $workPackage->taskcards()->with('type','task')
        //                     ->whereHas('type', function ($query) {
        //                         $query->where('code', 'basic');
        //                     })
        //                     ->count();

        // foreach($workPackage->taskcards->load('type')->where('type.name', 'CPCP') as $taskcard){
        //     $result = $taskcard->skills->map(function ($skills) {
        //         return collect($skills->toArray())
        //             ->only(['code'])
        //             ->all();
        //     });

        //     array_push($subset , $result);
        // }
        // $sip = $workPackage->taskcards()->with('type','task')
        //                     ->whereHas('type', function ($query) {
        //                         $query->where('code', 'sip');
        //                     })
        //                     ->count();

        // foreach($workPackage->taskcards->load('type')->where('type.name', 'SIP') as $taskcard){
        //     $result = $taskcard->skills->map(function ($skills) {
        //         return collect($skills->toArray())
        //             ->only(['code'])
        //             ->all();
        //     });

        //     array_push($subset , $result);
        // }
        // $cpcp = $workPackage->taskcards()->with('type','task')
        //                     ->whereHas('type', function ($query) {
        //                         $query->where('code', 'cpcp');
        //                     })
        //                     ->count();

        $total_taskcard  = $workPackage->taskcards->load('type')->where('type.of', 'taskcard-type-routine')->count('uuid');
        $total_manhour_taskcard  = $workPackage->taskcards->load('type')->where('type.of', 'taskcard-type-routine')->sum('estimation_manhour');
        
        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }
        $otr = array_count_values($skills);

        return view('frontend.project.hm.taskcard.routine.summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'workPackage' => $workPackage,
            'basic' => $basic,
            'sip' => $sip,
            'otr' => $otr,
            'cpcp' => $cpcp
        ]);
    }

}
