<?php

namespace App\Http\Controllers\Frontend\Quotation;

use App\Models\Aircraft;
use App\Models\ListUtil;
use App\Models\Item;
use App\Models\WorkPackage;
use App\Models\Quotation;
use App\Models\TaskCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\WorkPackageItemStore;
use App\Http\Requests\Frontend\WorkPackageItemUpdate;

class SummaryRoutineTaskcardController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function basic(Quotation $quotation, WorkPackage $workPackage)
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
        return view('frontend.quotation.taskcard.routine.basic.basic-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'quotation' => $quotation,
            'otr' => $otr,
            'workPackage' => $workPackage
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function cpcp(Quotation $quotation, WorkPackage $workPackage)
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

        return view('frontend.quotation.taskcard.routine.cpcp.cpcp-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'quotation' => $quotation,
            'otr' => $otr,
            'workPackage' => $workPackage
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function sip(Quotation $quotation, WorkPackage $workPackage)
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

        return view('frontend.quotation.taskcard.routine.sip.sip-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhour_taskcard' => $total_manhour_taskcard,
            'quotation' => $quotation,
            'otr' => $otr,
            'workPackage' => $workPackage
        ]);
    }


}
