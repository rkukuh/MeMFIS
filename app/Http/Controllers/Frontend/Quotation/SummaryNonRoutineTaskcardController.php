<?php

namespace App\Http\Controllers\Frontend\Quotation;

use App\Models\Aircraft;
use App\Models\Project;
use App\Models\ListUtil;
use App\Models\WorkPackage;
use App\Models\Quotation;
use App\Models\TaskCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\WorkPackageStore;
use App\Http\Requests\Frontend\WorkPackageUpdate;

class SummaryNonRoutineTaskcardController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WorkPackage  $workPackage
     * @return \Illuminate\Http\Response
     */
    public function adsb(Quotation $quotation, WorkPackage $workPackage)
    {
        $total_taskcard  = $workPackage->taskcards->load('type')->whereIn('type.code', ['ad','sb'])->count('uuid');
        $total_manhor_taskcard  = $workPackage->taskcards->load('type')->whereIn('type.code', ['ad','sb'])->sum('estimation_manhour');

        return view('frontend.quotation.taskcard.nonroutine.adsb.ad-sb-summary',[
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
    public function cmrawl(Quotation $quotation, WorkPackage $workPackage)
    {
        $total_taskcard  = $workPackage->taskcards->load('type')->whereIn('type.code', ['cmr','awl'])->count('uuid');
        $total_manhor_taskcard  = $workPackage->taskcards->load('type')->whereIn('type.code', ['cmr','awl'])->sum('estimation_manhour');

        return view('frontend.quotation.taskcard.nonroutine.cmrawl.cmr-awl-summary',[
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
    public function si(Quotation $quotation, WorkPackage $workPackage)
    {
        $total_taskcard  = $workPackage->taskcards->load('type')->where('type.code', 'si')->count('uuid');
        $total_manhor_taskcard  = $workPackage->taskcards->load('type')->where('type.code', 'si')->sum('estimation_manhour');

        return view('frontend.quotation.taskcard.nonroutine.si.si-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhor_taskcard' => $total_manhor_taskcard,
            'quotation' => $quotation,
            'workPackage' => $workPackage
        ]);
    }

}
