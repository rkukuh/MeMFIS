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
    public function __construct(){
        $this->jobcard = [];
    }
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
        $jobcards = $statusses_routine = $statusses_non_routine =  $basic =  $sip =  $cpcp =  $additional =  $adsb =  $cmr_awl =  $si =  $ea =  $eo =  $ht_crr = [];

        $tat = ProjectWorkpackage::where('project_id', $project->id)->sum('tat');
        $attention = json_decode($project->quotations[0]->attention);
        if(isset($project->data_htcrr)){
            $tat += json_decode($project->data_htcrr)->tat;
        }
        $quotation_ids = Quotation::where('project_id', $project->id)->pluck('id')->toArray();

        $jobcard_all = JobCard::whereIn('quotation_id', $quotation_ids)->with('progresses','jobcardable')
        // ->whereHas('jobcardable.type', function ($taskcard) {
        //     $taskcard->where('of', 'taskcard-type-routine');
        // })
        ->get();

        $jobcards["overall"] = $jobcard_all->count(); 
        $jobcards["routine"] = $jobcards["non_routine"] = 0; 

        foreach($jobcard_all as $jobcard){
            if($jobcard->jobcardable->type->of == 'taskcard-type-routine'){
                $jobcards["routine"] += 1;
            }else{
                $jobcards["non_routine"] += 1;
            }
        }

        $jobcards["overall_done"] = $jobcards["routine_done"] = $jobcards["non_routine_done"] = 0;
        
        foreach($jobcard_all as $key => $jobcard){
            $statusses[$key] = $jobcard->progresses->last()->status_id;
            if($jobcard->jobcardable->type->of == 'taskcard-type-routine'){
                array_push($statusses_routine, $jobcard->progresses->last()->status_id);
            }else{
                array_push($statusses_non_routine, $jobcard->progresses->last()->status_id);
            }

            switch($jobcard->jobcardable->type->code){
                case 'basic':
                    array_push($basic, $jobcard->progresses->last()->status_id);
                    break;
                case 'sip':
                    array_push($sip, $jobcard->progresses->last()->status_id);
                    break;
                case 'cpcp':
                    array_push($cpcp, $jobcard->progresses->last()->status_id);
                    break;
                case 'ad':
                    array_push($adsb, $jobcard->progresses->last()->status_id);
                    break;
                case 'sb':
                    array_push($adsb, $jobcard->progresses->last()->status_id);
                    break;
                case 'ea':
                    array_push($ea, $jobcard->progresses->last()->status_id);
                    break;
                case 'eo    ':
                    array_push($eo  , $jobcard->progresses->last()->status_id);
                    break;
                case 'si':
                    array_push($si, $jobcard->progresses->last()->status_id);
                    break;
                case 'cmr':
                    array_push($cmr_awl, $jobcard->progresses->last()->status_id);
                    break;
                case 'awl':
                    array_push($cmr_awl, $jobcard->progresses->last()->status_id);
                    break;
                default:
                    array_push($ht_crr, $jobcard->progresses->last()->status_id);
            }
        }
        
        $this->counting($statusses, "all");
        $this->counting($statusses_routine, "routine");
        $this->counting($statusses_non_routine, "non-routine");
        $this->counting($basic, "basic");
        $this->counting($sip, "sip");
        $this->counting($cpcp, "cpcp");
        $this->counting($adsb, "adsb");
        $this->counting($ea, "ea");
        $this->counting($eo, "eo");
        $this->counting($si, "si");
        $this->counting($cmr_awl, "cmr-awl");
        $this->counting($ht_crr, "ht-crr");

        return view('frontend.work-progress-report.show',[
            'tat' => $tat,
            'project' => $project,
            'jobcards' =>  $this->jobcard,
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
        $jobcards = JobCard::whereIn('quotation_id', $quotation_ids)->with('progresses','jobcardable')->get();

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

        $jobcards = JobCard::whereIn('quotation_id', $quotation_ids)->with('progresses','jobcardable')
        // ->whereHas('jobcardable.type', function ($taskcard) {
        //     $taskcard->where('of', 'taskcard-type-routine');
        // })
        ->get();

        foreach($jobcards as $key => $jobcard){
            if($jobcard->jobcardable->type->of == 'taskcard-type-routine'){
                array_push($statusses, $jobcard->progresses->last()->status_id);
            }
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

        $jobcards = JobCard::whereIn('quotation_id', $quotation_ids)->with('progresses','jobcardable')
        // ->whereHas('jobcardable.type', function ($taskcard) {
        //     $taskcard->where('of', 'taskcard-type-non-routine');
        // })
        ->get();

        foreach($jobcards as $key => $jobcard){
            if($jobcard->jobcardable->type->of == 'taskcard-type-non-routine'){
                array_push($statusses, $jobcard->progresses->last()->status_id);
            }
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

    public function counting($counter, $attribute){
        if(!empty($counter)){
            $container = [];
            $counter = array_count_values($counter);
            
            foreach($counter as $key => $value ){
                $counter[Status::find($key)->code] = $value;
            }
        
            if( isset($counter["open"]) ){ $container['open'] = $counter["open"]; } else{ $container["open"] = 0; }
            if( isset($counter["progress"]) ){ $container["progress"] = $counter["progress"]; } else{ $container["progress"] = 0; }
            if( isset($counter["pending"]) ){ $container["pending"] = $counter["pending"]; } else{ $container["pending"] = 0; }
            if( isset($counter["closed"]) ){ $container["closed"] = $counter["closed"]; } else{ $container["closed"] = 0; }
            if( isset($counter["released"]) ){ $container["released"] = $counter["released"]; } else{ $container["released"] = 0; }
            if( isset($counter["rii-released"]) ){ $container["rii-released "] = $counter["rii-released"]; } else{ $container["rii-released"] = 0; }
            if( $container["released"] > 0 || $container["rii-released"] > 0 ){ $container["done"] = $container["rii-released"] + $container["released"]; } else{ $container["done"] = 0; }
            
            $this->jobcard[$attribute] = $container;

            return;
        }else{
            return;
        }
    }
}