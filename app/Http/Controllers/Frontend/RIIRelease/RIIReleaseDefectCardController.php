<?php

namespace App\Http\Controllers\Frontend\RIIRelease;

use Auth;
use App\Models\Status;
use App\Models\JobCard;
use App\Models\Approval;
use App\Models\Progress;
use App\Models\DefectCard;
use App\Models\Inspection;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobCardStore;
use App\Http\Requests\Frontend\JobCardUpdate;

class RIIReleaseDefectCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.rii-release.defect-card.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.rii-release.defect-card.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\JobCardStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobCardStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobCard  $jobcard
     * @return \Illuminate\Http\Response
     */
    public function show(TaskCard $riirelease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobCard  $jobcard
     * @return \Illuminate\Http\Response
     */
    public function edit(DefectCard $riirelease)
    {
        $propose_corrections = array();
        foreach($riirelease->propose_corrections as $i => $defectCard){
            $this->propose_corrections[$i] =  $defectCard->code;
        }

        $propose_correction_text = '';
        foreach($riirelease->propose_corrections as $i => $defectCard){
            $this->propose_correction_text =  $defectCard->pivot->propose_correction_text;
        }

        return view('frontend.rii-release.defect-card.create', [
            'riirelease' => $riirelease,
            'propose_corrections' => $propose_corrections,
            'propose_correction_text' => $propose_correction_text,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\JobCardUpdate  $request
     * @param  \App\Models\JobCard  $jobcard
     * @return \Illuminate\Http\Response
     */
    public function update(JobCardUpdate $request, DefectCard $riirelease)
    {
        $status = Status::ofDefectcard()->where('code','rii-released')->first()->id;

        $riirelease->progresses()->save(new Progress([
            'status_id' => $status,
            'progressed_by' => Auth::id()
        ]));

        $riirelease->inspections()->save(new Inspection([
            'is_rii' => '1',
            'inspected_by' => Auth::id()
        ]));

        $riirelease->approvals()->save(new Approval([
            'approvable_id' => $riirelease->id,
            'conducted_by' => Auth::id(),
        ]));

        return response()->json($riirelease);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobcard
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCard $riirelease)
    {
        //
    }

}
