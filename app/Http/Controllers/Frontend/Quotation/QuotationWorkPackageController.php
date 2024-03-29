<?php

namespace App\Http\Controllers\Frontend\Quotation;

use App\Models\Quotation;
use App\Models\WorkPackage;
use App\Models\Pivots\ProjectWorkPackage;
use App\Models\Pivots\QuotationWorkPackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\QuotationStore;
use App\Http\Requests\Frontend\QuotationUpdate;

class QuotationWorkPackageController extends Controller
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
     * @param  \App\Http\Requests\Frontend\QuotationStore  $request
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Quotation $quotation)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation, WorkPackage $workPackage)
    {
        $quotation_workpackage = QuotationWorkPackage::where('quotation_id', $quotation->id)->where('workpackage_id', $workPackage->id)->first();
        $job_request = $quotation->workpackages()->where('quotation_id',$quotation->id)
        ->where('workpackage_id',$workPackage->id)
        ->first();
        $project_workpackage = ProjectWorkPackage::where('project_id',$quotation->quotationable->id)
        ->where('workpackage_id',$workPackage->id)
        ->first();
        $total_mhrs = $workPackage->taskcards->sum('estimation_manhour');
        $total_pfrm_factor = $workPackage->taskcards->sum('performance_factor');
        return view('frontend.quotation.workpackage.index',[
            'quotation' => $quotation,
            'total_mhrs' => $total_mhrs,
            'job_request' => $job_request,
            'workPackage' => $workPackage,
            'total_pfrm_factor' => $total_pfrm_factor,
            'project' => $quotation->quotationable->uuid,
            'project_workpackage' => $project_workpackage,
            'quotation_workpackage' => $quotation_workpackage,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation, WorkPackage $workPackage)
    {
        $job_request = $quotation->workpackages()->where('quotation_id',$quotation->id)
        ->where('workpackage_id',$workPackage->id)
        ->first();

        $project_workpackage = ProjectWorkPackage::where('project_id',$quotation->quotationable->id)
        ->where('workpackage_id',$workPackage->id)
        ->first();

        $total_mhrs = $workPackage->taskcards->sum('estimation_manhour');
        $total_pfrm_factor = $workPackage->taskcards->sum('performance_factor');
        return view('frontend.quotation.workpackage.index',[
            'workPackage' => $workPackage,
            'total_mhrs' => $total_mhrs,
            'total_pfrm_factor' => $total_pfrm_factor,
            'project' => $quotation->quotationable->uuid,
            'quotation' => $quotation,
            'job_request' => $job_request,
            'project_workpackage' => $project_workpackage,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\QuotationUpdate  $request
     * @param  \App\Models\Quotation  $quotation
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation, WorkPackage $workPackage)
    {
        return response()->json($quotation->workpackages()->updateExistingPivot($workPackage, ['manhour_total'=>$request->manhour_total,'manhour_rate_amount'=>$request->manhour_rate,'description'=>$request->description]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation, WorkPackage $workPackage)
    {
        $quotation->workpackages()->detach($workPackage);

        return response()->json($quotation);
    }

}
