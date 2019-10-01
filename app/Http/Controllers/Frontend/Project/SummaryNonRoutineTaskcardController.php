<?php

namespace App\Http\Controllers\Frontend\Project;

use App\Models\Aircraft;
use App\Models\Project;
use App\Models\ListUtil;
use App\Models\Pivots\ProjectWorkPackage;
use App\Models\WorkPackage;
use App\Models\TaskCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\WorkPackageStore;
use App\Http\Requests\Frontend\WorkPackageUpdate;
use App\Models\ProjectWorkPackageTaskCard;

class SummaryNonRoutineTaskcardController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function adsb(Project $project, WorkPackage $workPackage)
    {
        $total_manhour_taskcard = 0;
        $eri = 0;
        $skills = $subset = [];
        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)->where('workpackage_id',$workPackage->id)->first();
       
        $taskcards  =  $project_workpackage->eo_instructions()
        ->with('eo_instruction.eo_header.type')
        ->whereHas('eo_instruction.eo_header.type', function ($query) {
            $query->where('code', 'ad')->orWhere('code','sb');
        })->whereNull('deleted_at')->get();

       
            foreach($taskcards as $eo_instruction){
              
                if (sizeof($eo_instruction->eo_instruction->skills) > 1) {
                    $eri++;
                }else{
                    $result = $eo_instruction->eo_instruction->skills->map(function ($skills) {
                        return collect($skills->toArray())
                        ->only(['code'])
                        ->all();
                    });

                    array_push($subset, $result);
                }
                $total_manhour_taskcard += $eo_instruction->eo_instruction->estimation_manhour;

            }
     
       

        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }

        $otr = array_count_values($skills);
        $otr["eri"] = $eri;
        
        $total_taskcard  = $project_workpackage->eo_instructions()
        ->with('eo_instruction.eo_header.type')
        ->whereHas('eo_instruction.eo_header.type', function ($query) {
            $query->where('code', 'ad')->orWhere('code','sb');
        })->whereNull('deleted_at')->count('uuid');
        
     

        return view('frontend.project.hm.taskcard.nonroutine.adsb.ad-sb-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'otr' => $otr,
            'project' => $project,
            'workPackage' => $workPackage
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function cmrawl(Project $project, WorkPackage $workPackage)
    {
        $total_manhour_taskcard = 0;
        $eri = 0;
        $skills = $subset = [];
        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)->where('workpackage_id',$workPackage->id)->first();

        $taskcards  =  $project_workpackage->eo_instructions()
        ->with('eo_instruction.eo_header.type')
        ->whereHas('eo_instruction.eo_header.type', function ($query) {
            $query->where('code', 'cmr')->orWhere('code','awl');
        })->whereNull('deleted_at')->get();
        
       
        
            foreach($taskcards as $eo_instruction){
                if (sizeof($eo_instruction->eo_instruction->skills) > 1) {
                    $eri++;
                }else{
                    $result = $eo_instruction->eo_instruction->skills->map(function ($skills) {
                        return collect($skills->toArray())
                        ->only(['code'])
                        ->all();
                    });

                    array_push($subset, $result);
                }
                $total_manhour_taskcard += $eo_instruction->eo_instruction->estimation_manhour;

            }
      

        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }

        $otr = array_count_values($skills);
        $otr["eri"] = $eri;
        
        $total_taskcard  = $project_workpackage->eo_instructions()
        ->with('eo_instruction.eo_header.type')
        ->whereHas('eo_instruction.eo_header.type', function ($query) {
            $query->where('code', 'cmr')->orWhere('code','awl');
        })->whereNull('deleted_at')->count('uuid');
        
        
        return view('frontend.project.hm.taskcard.nonroutine.cmrawl.cmr-awl-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'otr' => $otr,
            'project' => $project,
            'workPackage' => $workPackage
        ]);
    }

     /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function si(Project $project, WorkPackage $workPackage)
    {
        
        $eri = 0;
        $skills = $subset = [];
        
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
        $taskcards = $taskcards->load('type')->where('type.name', 'Special Instruction');

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
        $total_taskcard  = $taskcards->load('type')->where('type.name', 'Special Instruction')->count('uuid');
        $total_manhour_taskcard  = $taskcards->load('type')->where('type.name', 'Special Instruction')->sum('estimation_manhour');
        

        return view('frontend.project.hm.taskcard.nonroutine.si.si-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'otr' => $otr,
            'project' => $project,
            'workPackage' => $workPackage
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function preliminary(Project $project, WorkPackage $workPackage)
    {
        
        $eri = 0;
        $skills = $subset = [];
        
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
        $taskcards = $taskcards->load('type')->where('type.code', 'preliminary');

        // foreach($taskcards as $taskcard){
        //     if (sizeof($taskcard->skills) > 1) {
        //         $eri++;
        //     }else{
        //         $result = $taskcard->skills->map(function ($skills) {
        //             return collect($skills->toArray())
        //             ->only(['code'])
        //             ->all();
        //         });

        //         array_push($subset, $result);
        //     }
        // }

        // foreach ($subset as $value) {
        //     foreach($value as $skill){
        //         array_push($skills, $skill["code"]);
        //     }
        // }

        $otr = array_count_values($skills);
        $otr["eri"] = $eri;
        $total_taskcard  = $taskcards->load('type')->where('type.code', 'preliminary')->count('uuid');
        $total_manhour_taskcard  = $taskcards->load('type')->where('type.code', 'preliminary')->sum('estimation_manhour');
        

        return view('frontend.project.hm.taskcard.nonroutine.preliminary.preliminary-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'otr' => $otr,
            'project' => $project,
            'workPackage' => $workPackage
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function ea(Project $project, WorkPackage $workPackage)
    {
        $total_manhour_taskcard = 0;
        $eri = 0;
        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)->where('workpackage_id',$workPackage->id)->first();
        $skills = $subset = [];

        $taskcards = $project_workpackage->eo_instructions()
                     ->with('eo_instruction.eo_header.type')
                     ->whereHas('eo_instruction.eo_header.type', function ($query) {
                     $query->where('code', 'ea');
                     })->whereNull('deleted_at')->get();
                     
                    //  dd($taskcards);
       
                    foreach($taskcards as $eo_instruction){
                        if (sizeof($eo_instruction->eo_instruction->skills) > 1) {
                            $eri++;
                        }else{
                            $result = $eo_instruction->eo_instruction->skills->map(function ($skills) {
                                return collect($skills->toArray())
                                ->only(['code'])
                                ->all();
                            });
        
                            array_push($subset, $result);
                        }
                        $total_manhour_taskcard += $eo_instruction->eo_instruction->estimation_manhour;
                    }

        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }

        $otr = array_count_values($skills);
        $otr["eri"] = $eri;
        
        $total_taskcard  = $project_workpackage->eo_instructions()
        ->with('eo_instruction.eo_header.type')
        ->whereHas('eo_instruction.eo_header.type', function ($query) {
        $query->where('code', 'ea');
        })->count('uuid');


        return view('frontend.project.hm.taskcard.nonroutine.ea.ea-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'otr' => $otr,
            'project' => $project,
            'workPackage' => $workPackage
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function eo(Project $project, WorkPackage $workPackage)
    {   
        $total_manhour_taskcard = 0;
        $eri = 0;
        $project_workpackage = ProjectWorkPackage::where('project_id',$project->id)->where('workpackage_id',$workPackage->id)->first();
        $skills = $subset = [];
        
        $taskcards = $project_workpackage->eo_instructions()
        ->with('eo_instruction.eo_header.type')
        ->whereHas('eo_instruction.eo_header.type', function ($query) {
            $query->where('code', 'eo');
        })->whereNull('deleted_at')->get();
        

        foreach($taskcards as $eo_instruction){
            if (sizeof($eo_instruction->eo_instruction->skills) > 1) {
                $eri++;
            }else{
              
                
                $result = $eo_instruction->eo_instruction->skills->map(function ($skills) {
                    return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
                });

                array_push($subset, $result);
            }
             $total_manhour_taskcard += $eo_instruction->eo_instruction->estimation_manhour;
        }
        
        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }

        $otr = array_count_values($skills);
        $otr["eri"] = $eri;
        
        $total_taskcard  = $project_workpackage->eo_instructions()
        ->with('eo_instruction.eo_header.type')
        ->whereHas('eo_instruction.eo_header.type', function ($query) {
            $query->where('code', 'eo');
        })->count('uuid');


        return view('frontend.project.hm.taskcard.nonroutine.eo.eo-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'otr' => $otr,
            'project' => $project,
            'workPackage' => $workPackage
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
        $skills = $subset = [];

        foreach($workPackage->taskcards->load('type')->whereIn('type.code', ['ad','sb']) as $taskcard){
            foreach($taskcard->eo_instructions as $eo_instruction){
                $result = $eo_instruction->skills->map(function ($skills) {
                    return collect($skills->toArray())
                        ->only(['code'])
                        ->all();
                });
            }

            array_push($subset , $result);
        }

        $adsb = $workPackage->taskcards()->with('type','task')
                ->whereHas('type', function ($query) {
                    $query->where('code', 'ad')->orwhere('code', 'sb');
                })
                ->count();

        foreach($workPackage->taskcards->load('type')->whereIn('type.code', ['cmr','awl']) as $taskcard){
            $result = $taskcard->skills->map(function ($skills) {
                return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
            });

            array_push($subset , $result);
        }
        
        $cmrawl = $workPackage->taskcards()->with('type','task')
                ->whereHas('type', function ($query) {
                    $query->where('code', 'cmr')->orwhere('code', 'awl');
                })
                ->count();

        foreach($workPackage->taskcards->load('type')->where('type.code', 'si') as $taskcard){
            $result = $taskcard->skills->map(function ($skills) {
                return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
            });

            array_push($subset , $result);
        }

        $si = $workPackage->taskcards()->with('type','task')
                ->whereHas('type', function ($query) {
                    $query->where('code', 'si');
                })
                ->count();

        
        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }

        $otr = array_count_values($skills);
        $otr["eri"] = $eri;
        $total_taskcard  = $workPackage->taskcards->load('type')->where('type.of', 'taskcard-type-non-routine')->count('uuid');
        $total_manhour_taskcard  = $workPackage->taskcards->load('type')->where('type.of', 'taskcard-type-non-routine')->sum('estimation_manhour');

        return view('frontend.project.hm.taskcard.nonroutine.summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'workPackage' => $workPackage,
            'adsb' => $adsb,
            'cmrawl' => $cmrawl,
            'otr' => $otr,
            'si' => $si,
        ]);
    }

}
