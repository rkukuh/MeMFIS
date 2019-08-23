<?php

namespace App\Http\Controllers\Frontend\WorkProgressReport;

use App\Models\Status;
use App\Models\Project;
use App\Models\JobCard;
use App\Models\Quotation;
use App\Models\Pivots\ProjectWorkpackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WorkProgressReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.work-progress-report.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \app\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $jobcards = [];
        $tat = ProjectWorkpackage::where('project_id', $project->id)->sum('tat');
        $attention = json_decode($project->quotations[0]->attention);
        if(isset($project->data_htcrr)){
            $tat += json_decode($project->data_htcrr)->tat;
        }
        $quotation_ids = Quotation::where('project_id', $project->id)->pluck('id')->toArray();

        $jobcards["overall"] = Jobcard::whereIn('quotation_id', $quotation_ids)->count();
        $jobcards["overall_done"] = Jobcard::whereIn('quotation_id', $quotation_ids)->count();
        $jobcards["routine"] = Jobcard::whereIn('quotation_id', $quotation_ids)->count();
        $jobcards["routine_done"] = Jobcard::whereIn('quotation_id', $quotation_ids)->count();
        $jobcards["non_routine"] = Jobcard::whereIn('quotation_id', $quotation_ids)->count();
        $jobcards["non_routine_done"] = Jobcard::whereIn('quotation_id', $quotation_ids)->count();

        return view('frontend.work-progress-report.show',[
            'tat' => $tat,
            'project' => $project,
            'attention' => $attention,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \app\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \app\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \app\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }

    /**
     * Send JSON for morris.donut data.
     *
     * @param  \app\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function overall(Project $project){
        $quotation_ids = Quotation::where('project_id', $project->id)->pluck('id')->toArray();
        $statusses = [];
        $jobcards = JobCard::whereIn('quotation_id', $quotation_ids)->with('progresses','taskcard')->get();

        foreach($jobcards as $key => $jobcard){
            $statusses[$key] = $jobcard->progresses->last()->status_id;
        }
        $count_each = array_count_values($statusses);
        foreach($count_each as $key => $value ){
            $count_each[Status::find($key)->code] = $value;
        }

        $data[0]['label'] = 'OPEN'; 
        if( isset($count_each["open"]) ){ $data[0]['value'] = $count_each["open"]; } else{ $data[0]['value'] = 0; }
        $data[1]['label'] = 'IN-PROGRESS'; 
        if( isset($count_each["progress"]) ){ $data[1]['value'] = $count_each["progress"]; } else{ $data[1]['value'] = 0; }
        $data[2]['label'] = 'PENDING / PAUSE'; 
        if( isset($count_each["pending"]) ){ $data[2]['value'] = $count_each["pending"]; } else{ $data[2]['value'] = 0; }
        $data[3]['label'] = 'CLOSED'; 
        if( isset($count_each["closed"]) ){ $data[3]['value'] = $count_each["closed"]; } else{ $data[3]['value'] = 0; }
        $data[4]['label'] = 'RELEASED'; 
        if( isset($count_each["released"]) ){ $data[4]['value'] = $count_each["released"]; } else{ $data[4]['value'] = 0; }
        $data[5]['label'] = 'RII RELEASED'; 
        if( isset($count_each["rii-released"]) ){ $data[5]['value'] = $count_each["rii-released"]; } else{ $data[5]['value'] = 0; }

        return response()->json($data);
    }

    /**
     * Send JSON for morris.donut data.
     *
     * @param  \app\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function routine(Project $project){
        $statusses = [];
        $quotation_ids = Quotation::where('project_id', $project->id)->pluck('id')->toArray();

        $jobcards = JobCard::whereIn('quotation_id', $quotation_ids)->with('progresses','taskcard')
        ->whereHas('taskcard.type', function ($taskcard) {
            $taskcard->where('of', 'taskcard-type-routine');
        })->get();

        foreach($jobcards as $key => $jobcard){
            $statusses[$key] = $jobcard->progresses->last()->status_id;
        }
        $count_each = array_count_values($statusses);
        foreach($count_each as $key => $value ){
            $count_each[Status::find($key)->code] = $value;
        }

        $data[0]['label'] = 'OPEN'; 
        if( isset($count_each["open"]) ){ $data[0]['value'] = $count_each["open"]; } else{ $data[0]['value'] = 0; }
        $data[1]['label'] = 'IN-PROGRESS'; 
        if( isset($count_each["progress"]) ){ $data[1]['value'] = $count_each["progress"]; } else{ $data[1]['value'] = 0; }
        $data[2]['label'] = 'PENDING / PAUSE'; 
        if( isset($count_each["pending"]) ){ $data[2]['value'] = $count_each["pending"]; } else{ $data[2]['value'] = 0; }
        $data[3]['label'] = 'CLOSED'; 
        if( isset($count_each["closed"]) ){ $data[3]['value'] = $count_each["closed"]; } else{ $data[3]['value'] = 0; }
        $data[4]['label'] = 'RELEASED'; 
        if( isset($count_each["released"]) ){ $data[4]['value'] = $count_each["released"]; } else{ $data[4]['value'] = 0; }
        $data[5]['label'] = 'RII RELEASED'; 
        if( isset($count_each["rii-released"]) ){ $data[5]['value'] = $count_each["rii-released"]; } else{ $data[5]['value'] = 0; }

        return response()->json($data);
    }

    /**
     * Send JSON for morris.donut data.
     *
     * @param  \app\Models\Project $project
     * @return \Illuminate\Http\Response
     */
    public function non_routine(Project $project){
        $statusses = [];
        $quotation_ids = Quotation::where('project_id', $project->id)->pluck('id')->toArray();

        $jobcards = JobCard::whereIn('quotation_id', $quotation_ids)->with('progresses','taskcard')
        ->whereHas('taskcard.type', function ($taskcard) {
            $taskcard->where('of', 'taskcard-type-non-routine');
        })->get();

        foreach($jobcards as $key => $jobcard){
            $statusses[$key] = $jobcard->progresses->last()->status_id;
        }
        $count_each = array_count_values($statusses);
        foreach($count_each as $key => $value ){
            $count_each[Status::find($key)->code] = $value;
        }

        $data[0]['label'] = 'OPEN'; 
        if( isset($count_each["open"]) ){ $data[0]['value'] = $count_each["open"]; } else{ $data[0]['value'] = 0; }
        $data[1]['label'] = 'IN-PROGRESS'; 
        if( isset($count_each["progress"]) ){ $data[1]['value'] = $count_each["progress"]; } else{ $data[1]['value'] = 0; }
        $data[2]['label'] = 'PENDING / PAUSE'; 
        if( isset($count_each["pending"]) ){ $data[2]['value'] = $count_each["pending"]; } else{ $data[2]['value'] = 0; }
        $data[3]['label'] = 'CLOSED'; 
        if( isset($count_each["closed"]) ){ $data[3]['value'] = $count_each["closed"]; } else{ $data[3]['value'] = 0; }
        $data[4]['label'] = 'RELEASED'; 
        if( isset($count_each["released"]) ){ $data[4]['value'] = $count_each["released"]; } else{ $data[4]['value'] = 0; }
        $data[5]['label'] = 'RII RELEASED'; 
        if( isset($count_each["rii-released"]) ){ $data[5]['value'] = $count_each["rii-released"]; } else{ $data[5]['value'] = 0; }

        return response()->json($data);
    }
}
