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
        $total_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'Basic')->count('uuid');
        $total_manhor_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'Basic')->sum('estimation_manhour');
        return view('frontend.quotation.taskcard.routine.basic.basic-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhor_taskcard' => $total_manhor_taskcard,
            'quotation' => $quotation,
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
        $total_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'CPCP')->count('uuid');
        $total_manhor_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'CPCP')->sum('estimation_manhour');

        return view('frontend.quotation.taskcard.routine.cpcp.cpcp-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhor_taskcard' => $total_manhor_taskcard,
            'quotation' => $quotation,
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
        $total_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'SIP')->count('uuid');
        $total_manhor_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'SIP')->sum('estimation_manhour');

        return view('frontend.quotation.taskcard.routine.sip.sip-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhor_taskcard' => $total_manhor_taskcard,
            'quotation' => $quotation,
            'workPackage' => $workPackage
        ]);
    }


}
