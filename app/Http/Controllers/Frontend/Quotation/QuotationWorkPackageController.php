<?php

namespace App\Http\Controllers\Frontend\Quotation;

use App\Models\Quotation;
use App\Models\Project;
use App\Models\Aircraft;
use App\Models\Customer;
use App\Models\WorkPackage;
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
    public function show(Project $project, Workpackage $workPackage)
    {
        $quotation  = Quotation::where('project_id',$project->id)->first();
        // $job_request = $quotation->workpackages->wherePivot('workpackage_id',$workPackage->id);
        // dd($job_request);

        $total_mhrs = $workPackage->taskcards->sum('estimation_manhour');
        $total_pfrm_factor = $workPackage->taskcards->sum('performance_factor');
        return view('frontend.quotation.workpackage.index',[
            'workPackage' => $workPackage,
            'total_mhrs' => $total_mhrs,
            'total_pfrm_factor' => $total_pfrm_factor,
            'project' => $project,
            'quotation' => $quotation,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, Workpackage $workPackage)
    {
        $quotation  = Quotation::where('project_id',$project->id)->first();
        $job_request = $quotation->workpackages()->wherePivot('workpackage_id', $workPackage->id)->first();

        $total_mhrs = $workPackage->taskcards->sum('estimation_manhour');
        $total_pfrm_factor = $workPackage->taskcards->sum('performance_factor');
        return view('frontend.quotation.workpackage.index',[
            'workPackage' => $workPackage,
            'total_mhrs' => $total_mhrs,
            'total_pfrm_factor' => $total_pfrm_factor,
            'project' => $project,
           'job_request' => $job_request,
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\QuotationUpdate  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, Workpackage $workPackage)
    {
        $quotation  = Quotation::where('project_id',$project->id)->first();

        $quotation->workpackages()->updateExistingPivot($workPackage, ['manhour_total'=>$request->manhour_total,'manhour_rate'=>$request->manhour_rate,'description'=>$request->description]);

        return response()->json($quotation->workpackages);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation,WorkPackage $workPackage)
    {
        $quotation->workpackages()->detach($workPackage);

        return response()->json($quotation);
    }

}
