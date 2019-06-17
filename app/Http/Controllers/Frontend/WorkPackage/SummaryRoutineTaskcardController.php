<?php

namespace App\Http\Controllers\Frontend\WorkPackage;

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
        $total_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'Basic')->count('uuid');
        $total_manhor_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'Basic')->sum('estimation_manhour');

        return view('frontend.workpackage.routine.basic.basic-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhor_taskcard' => $total_manhor_taskcard,
            'workPackage' => $workPackage
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
        $total_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'CPCP')->count('uuid');
        $total_manhor_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'CPCP')->sum('estimation_manhour');

        return view('frontend.workpackage.routine.cpcp.cpcp-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhor_taskcard' => $total_manhor_taskcard,
            'workPackage' => $workPackage
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
        $total_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'SIP')->count('uuid');
        $total_manhor_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'SIP')->sum('estimation_manhour');

        return view('frontend.workpackage.routine.sip.sip-summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhor_taskcard' => $total_manhor_taskcard,
            'workPackage' => $workPackage
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
        $total_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'SIP')->count('uuid');
        $total_manhor_taskcard  = $workPackage->taskcards->load('type')->where('type.name', 'SIP')->sum('estimation_manhour');

        return view('frontend.workpackage.routine.summary',[
            'total_taskcard' => $total_taskcard,
            'total_manhor_taskcard' => $total_manhor_taskcard,
            'workPackage' => $workPackage
        ]);
    }

}
