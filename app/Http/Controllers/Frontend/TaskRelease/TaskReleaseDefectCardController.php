<?php

namespace App\Http\Controllers\Frontend\TaskRelease;

use Auth;
use App\Models\Status;
use App\Models\JobCard;
use App\Models\Approval;
use App\Models\Progress;
use App\Models\Inspection;
use App\Models\DefectCard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobCardStore;
use App\Http\Requests\Frontend\JobCardUpdate;

class TaskReleaseDefectCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.task-release.defect-card.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.task-release.defect-card.create');
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
    public function edit(DefectCard $taskrelease)
    {
        $propose_corrections = array();
        foreach($taskrelease->propose_corrections as $i => $defectCard){
            $this->propose_corrections[$i] =  $defectCard->code;
        }

        $propose_correction_text = '';
        foreach($taskrelease->propose_corrections as $i => $defectCard){
            $this->propose_correction_text =  $defectCard->pivot->propose_correction_text;
        }


        return view('frontend.task-release.defect-card.create', [
            'taskrelease' => $taskrelease,
            'propose_corrections' => $propose_corrections,
            'propose_correction_text' => $propose_correction_text,

        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TaskCardUpdate  $request
     * @param  \App\Models\TaskCard  $taskCard
     * @return \Illuminate\Http\Response
     */
    public function update(JobCardUpdate $request, DefectCard $taskrelease)
    {
        $status = Status::ofDefectcard()->where('code','released')->first()->id;

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
