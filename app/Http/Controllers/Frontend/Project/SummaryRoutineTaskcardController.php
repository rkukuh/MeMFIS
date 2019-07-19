<?php

namespace App\Http\Controllers\Frontend\Project;

use App\Models\Aircraft;
use App\Models\Project;
use App\Models\ListUtil;
use App\Models\WorkPackage;
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
    public function basic(WorkPackage $workPackage)
    {
        $taskcards  = $workPackage->taskcards->load('type')->where('type.name', 'Basic');
        $skills = $subset = [];

        foreach($taskcards as $taskcard){
            $result = $taskcard->skills->map(function ($skills) {
                return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
            });

            array_push($subset , $result);
        }
        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }
        $otr = array_count_values($skills);
        $total_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'Basic')->count('uuid');
        $total_manhour_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'Basic')->sum('estimation_manhour');
        return view('frontend.project.hm.taskcard.routine.basic.basic-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'otr' => $otr,
            'workPackage' => $workPackage,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function cpcp(WorkPackage $workPackage)
    {
        $taskcards  = $workPackage->taskcards->load('type')->where('type.name', 'CPCP');
        $skills = $subset = [];

        foreach($taskcards as $taskcard){
            $result = $taskcard->skills->map(function ($skills) {
                return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
            });

            array_push($subset , $result);
        }
        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }
        $otr = array_count_values($skills);
        $total_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'CPCP')->count('uuid');
        $total_manhour_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'CPCP')->sum('estimation_manhour');

        return view('frontend.project.hm.taskcard.routine.cpcp.cpcp-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'otr' => $otr,
            'workPackage' => $workPackage,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function sip(WorkPackage $workPackage)
    {
        // To Do: kalau ada waktu buat pengecekan kalau skill lebih dari 1 maka return ERI
        $taskcards  = $workPackage->taskcards->load('type')->where('type.name', 'SIP');
        $skills = $subset = [];

        foreach($taskcards as $taskcard){
            $result = $taskcard->skills->map(function ($skills) {
                return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
            });

            array_push($subset , $result);
        }
        foreach ($subset as $value) {
            foreach($value as $skill){
                array_push($skills, $skill["code"]);
            }
        }
        $otr = array_count_values($skills);
        $total_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'SIP')->count('uuid');
        $total_manhour_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'SIP')->sum('estimation_manhour');

        return view('frontend.project.hm.taskcard.routine.sip.sip-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'otr' => $otr,
            'workPackage' => $workPackage,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function summary(WorkPackage $workPackage)
    {
        $skills = $subset = [];

        foreach($workPackage->taskcards->load('type')->where('type.name', 'Basic') as $taskcard){
            $result = $taskcard->skills->map(function ($skills) {
                return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
            });

            array_push($subset , $result);
        }
        
        $basic = $workPackage->taskcards()->with('type','task')
                            ->whereHas('type', function ($query) {
                                $query->where('code', 'basic');
                            })
                            ->count();

        foreach($workPackage->taskcards->load('type')->where('type.name', 'CPCP') as $taskcard){
            $result = $taskcard->skills->map(function ($skills) {
                return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
            });

            array_push($subset , $result);
        }
        $sip = $workPackage->taskcards()->with('type','task')
                            ->whereHas('type', function ($query) {
                                $query->where('code', 'sip');
                            })
                            ->count();

        foreach($workPackage->taskcards->load('type')->where('type.name', 'SIP') as $taskcard){
            $result = $taskcard->skills->map(function ($skills) {
                return collect($skills->toArray())
                    ->only(['code'])
                    ->all();
            });

            array_push($subset , $result);
        }
        $cpcp = $workPackage->taskcards()->with('type','task')
                            ->whereHas('type', function ($query) {
                                $query->where('code', 'cpcp');
                            })
                            ->count();

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
