<?php

namespace App\Http\Controllers\Frontend\RIIRelease;

use Auth;
use carbon\Carbon;
use App\Models\Status;
use App\Models\JobCard;
use App\Models\Approval;
use App\Models\Progress;
use App\Models\Inspection;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobCardStore;
use App\Http\Requests\Frontend\JobCardUpdate;

class RIIReleaseJobCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.rii-release.job-card.index');
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
    public function edit(JobCard $riirelease)
    {
        $status = Status::ofJobCard()->where('id',$riirelease->progresses->last()->status_id)->first()->code;

        return view('frontend.rii-release.job-card.create', [
            'taskrelease' => $riirelease,
            'materials' => $riirelease->jobcardable->materials,
            'tools' => $riirelease->jobcardable->tools,
            'status' => $status,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\JobCardUpdate  $request
     * @param  \App\Models\JobCard  $jobcard
     * @return \Illuminate\Http\Response
     */
    public function update(JobCardUpdate $request, JobCard $riirelease)
    {
        $status = Status::ofJobcard()->where('code','rii-released')->first()->id;

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
            'is_approved' => 1
        ]));

        return response()->json($riirelease);
    }

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
