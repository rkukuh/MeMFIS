<?php

namespace App\Http\Controllers\Frontend\TaskRelease;

use Auth;
use App\Models\Status;
use App\Models\JobCard;
use App\Models\Approval;
use App\Models\Progress;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobCardStore;
use App\Http\Requests\Frontend\JobCardUpdate;

class TaskReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.task-release.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.task-release.create');
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
       //
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

        $taskrelease->approvals()->save(new Approval([
            'approvable_id' => $taskrelease->id,
            'approved_by' => Auth::id(),
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
