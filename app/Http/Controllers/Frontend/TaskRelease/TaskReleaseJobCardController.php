<?php

namespace App\Http\Controllers\Frontend\TaskRelease;

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

class TaskReleaseJobCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.task-release.job-card.index');
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
    public function show(TaskCard $taskrelease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobCard  $jobcard
     * @return \Illuminate\Http\Response
     */
    public function edit(JobCard $taskrelease)
    {
        $status = Status::ofJobCard()->where('id',$taskrelease->progresses->last()->status_id)->first()->code;


        return view('frontend.task-release.job-card.create', [
            'taskrelease' => $taskrelease,
            'materials' => $taskrelease->jobcardable->materials,
            'tools' => $taskrelease->jobcardable->tools,
            'status' => $status,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardUpdate  $request
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function update(JobCardUpdate $request, JobCard $taskrelease)
    {
        $status = Status::ofJobcard()->where('code','released')->first()->id;

        $taskrelease->progresses()->save(new Progress([
            'status_id' => $status,
            'progressed_by' => Auth::id()
        ]));

        $taskrelease->inspections()->save(new Inspection([
            'is_rii' => '0',
            'inspected_by' => Auth::id()
        ]));

        $taskrelease->approvals()->save(new Approval([
            'approvable_id' => $taskrelease->id,
            'conducted_by' => Auth::id(),
            'is_approved' => 1
        ]));

        return response()->json($taskrelease);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobcard
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCard $taskrelease)
    {
        //
    }

}
