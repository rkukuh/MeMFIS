<?php

namespace App\Http\Controllers\Frontend\WorkProgressReport;

use Carbon\Carbon;
use App\Models\Type;
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
        $this->statuses = Status::ofJobCard()->get();
        $this->tc_type = Type::where('of', 'like', 'taskcard-type%')->pluck('code');
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
        $jobcards = $statusses_routine = $statusses_non_routine =  $basic =  $sip =  $cpcp =  $additional =  $adsb =  $cmr_awl =  $si =  $ea =  $eo =  $ht_crr = $manhours = [];

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
            $this->actual_manhours($jobcard);
            $jobcard->tc_type = $jobcard->jobcardable->type->code;
            $jobcard->of = $jobcard->jobcardable->type->of;
            $jobcard->estimation_manhour = $jobcard->jobcardable->estimation_manhour;
            if($jobcard->jobcardable->type->of == 'taskcard-type-routine'){
                $jobcards["routine"] += 1;
            }else{
                $jobcards["non_routine"] += 1;
            }
            
        }
        
        foreach($this->tc_type as $type){
            if( sizeof($jobcard_all->where("tc_type", $type)->pluck("tc_type")) > 0 ) {
                $manhours[$type]["actual"] = $jobcard_all->where('tc_type', $type)->sum('actual_manhours');
                $manhours[$type]["total"] = $jobcard_all->where('tc_type', $type)->sum('estimation_manhour');
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

        $col["routine"] = $jobcard_all->where("of", "taskcard-type-routine")->pluck('tc_type');
        if (isset($col["routine"])) {
            $col["routine"] = 12 / sizeof(array_unique($col["routine"]->toArray()));
        }else{
            $col["routine"] = 12;
        }
        
        return view('frontend.work-progress-report.show',[
            'col' => $col,
            'tat' => $tat,
            'project' => $project,
            'manhours' => $manhours,
            'attention' => $attention,
            'jobcards' =>  $this->jobcard
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

    public function actual_manhours($jobcard){
        $manhours = 0;
        foreach($jobcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
            $date1 = null;
            foreach($values as $value){
                if($this->statuses->where('id',$value->status_id)->first()->code <> "open" or $this->statuses->where('id',$value->status_id)->first()->code <> "released" or $this->statuses->where('id',$value->status_id)->first()->code <> "rii-released"){
                    if($jobcard->helpers->where('userID',$key)->first() == null){
                        if($date1 <> null){
                            $t1 = Carbon::parse($date1);
                            $t2 = Carbon::parse($value->created_at);
                            $diff = $t1->diffInSeconds($t2);
                            $manhours = $manhours + $diff;
                        }
                        $date1 = $value->created_at;
                    }
                }

            }
        }
        $manhours = $manhours/3600;
        $manhours_break = 0;
        foreach($jobcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
            for($i=0; $i<sizeOf($values->toArray()); $i++){
                if($this->statuses->where('id',$values[$i]->status_id)->first()->code == "pending"){
                    if($jobcard->helpers->where('userID',$key)->first() == null){
                        if($date1 <> null){
                            if($i+1 < sizeOf($values->toArray())){
                                $t2 = Carbon::parse($values[$i]->created_at);
                                $t3 = Carbon::parse($values[$i+1]->created_at);
                                $diff = $t2->diffInSeconds($t3);
                                $manhours_break = $manhours_break + $diff;
                            }
                        }
                    }
                }
            }
        }

        $manhours_break = $manhours_break/3600;
        $actual_manhours =number_format($manhours-$manhours_break, 2);
        $jobcard->actual_manhours = $actual_manhours;
        return $actual_manhours;
    }
}