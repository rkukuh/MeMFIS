<?php

namespace App\Http\Controllers\Frontend\WorkProgressReport;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Status;
use App\Models\Project;
use App\Models\JobCard;
use App\Models\Quotation;
use App\Models\DefectCard;
use App\Models\Pivots\ProjectWorkpackage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HtCrr;

class WorkProgressReportController extends Controller
{
    public function __construct(){
        $this->jobcard = $this->col["routine"] = $this->col["non-routine"] = [];
        $this->statuses = Status::ofJobCard()->get();
        $this->statuses = $this->statuses->merge(Status::OfDefectCard()->get());
        $this->tc_type = Type::where('of', 'like', 'taskcard-type%')->pluck('code');
        $this->tc_type->push("additionals");
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
        $jobcards = $statusses_routine = $statusses_non_routine =  $statusses_additionals = $basic =  $sip =  $cpcp =  $additional =  $adsb =  $cmr_awl =  $si =  $ea =  $eo =  $ht_crr = $manhours = $statusses = $defectcards = [];
        $htcrrs = HtCrr::where('project_id',$project->id)->whereNull('parent_id')->get();

        foreach($project->childs as $additionals){
            if(sizeof($additionals->defectcards) > 0){
                foreach($additionals->defectcards as $dc){
                    array_push($defectcards, $dc);
                }
            }
        }

        $tat = ProjectWorkpackage::where('project_id', $project->id)->sum('tat');
        if(isset($project->quotations->first()->attention)){
            $attention = json_decode($project->quotations->first()->attention);
        }else{
            $attention = null;
        }

        if(isset($project->data_htcrr)){
            $tat += json_decode($project->data_htcrr)->tat;
        }


        $quotation_ids = Quotation::where('quotationable_id', $project->id)->orWhere('parent_id', $project->id)->has('approvals', '>', 1)->pluck('id')->toArray();
        
        $jobcard_routine = JobCard::whereIn('quotation_id', $quotation_ids)
                        ->where('jobcardable_type', 'App\Models\TaskCard')->with('progresses','jobcardable')
        // ->whereHas('jobcardable.type', function ($taskcard) {
        //     $taskcard->where('of', 'taskcard-type-routine');
        // })
        ->get();

        $jobcard_nonrotine = JobCard::whereIn('quotation_id', $quotation_ids)
                        ->where('jobcardable_type', 'App\Models\EOInstruction')->with('progresses','jobcardable.eo_header.type')
                        ->get();
        
        // $additionals = DefectCard::whereIn('quotation_additional_id', $quotation_ids)->get();
        $additionals = $defectcards;

        $jobcards["routine"] = $jobcards["non_routine"] = $jobcards["additionals"]  = 0; 

        foreach($jobcard_routine as $jobcard){
            $this->actual_manhours($jobcard);
            $jobcard->tc_type = $jobcard->jobcardable->type->code;
            $jobcard->of = $jobcard->jobcardable->type->of;
            $jobcard->estimation_manhour = $jobcard->jobcardable->estimation_manhour;
            $jobcards["routine"] += 1;
        }

        foreach($jobcard_nonrotine as $jobcard){
            $this->actual_manhours($jobcard);
            $jobcard->tc_type = $jobcard->jobcardable->eo_header->type->code;
            $jobcard->of = $jobcard->jobcardable->eo_header->type->of;
            $jobcard->estimation_manhour = $jobcard->jobcardable->estimation_manhour;
            $jobcards["non_routine"] += 1;
        }

        foreach($additionals as $jobcard){
            $this->actual_manhours($jobcard);
            $jobcard->tc_type = "additionals";
            $jobcard->of = "additionals";
            $jobcards["additionals"] += 1;
        }

        foreach($htcrrs as $jobcard){
            $jobcard->actual_manhours = array_sum($jobcard->actual_manhour);
            $jobcard->tc_type = "htcrr";
            $jobcard->of = $jobcard->type->of;
            $jobcards["non_routine"] += 1;
        }
        
        $jobcard_nonrotine = $jobcard_nonrotine->merge($htcrrs);
        $jobcard_all = $jobcard_routine->merge($jobcard_nonrotine);
        $jobcard_all = $jobcard_all->merge($additionals);
        
        $jobcards["overall"] = $jobcard_all->count(); 
        
        $jobcards["overall_done"] = $jobcards["routine_done"] = $jobcards["non_routine_done"] = $jobcards["additionals"] = $jobcards["htcrr"] = 0;
        
        foreach($jobcard_all as $key => $jobcard){
            $statusses[$key] = $jobcard->progresses->last()->status_id;
            $jobcard->status = Status::find($jobcard->progresses->last()->status_id)->code;
            if($jobcard->of == 'taskcard-type-routine'){
                array_push($statusses_routine, $jobcard->progresses->last()->status_id);
            }elseif($jobcard->of == 'taskcard-type-non-routine'){
                array_push($statusses_non_routine, $jobcard->progresses->last()->status_id);
            }elseif($jobcard->of == 'htcrr-type'){
                array_push($statusses_non_routine, $jobcard->progresses->last()->status_id);
            }else{
                array_push($statusses_additionals, $jobcard->progresses->last()->status_id);
            }


            switch($jobcard->tc_type){
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
                case 'eo':
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
                case 'htcrr':
                    array_push($ht_crr, $jobcard->progresses->last()->status_id);
                    break;
                case 'additionals':
                    array_push($additional, $jobcard->progresses->last()->status_id);
                    break;
            }
        }

        foreach($this->tc_type as $type){
            if( sizeof($jobcard_all->where("tc_type", $type)->pluck("tc_type")) > 0 ) {
                $manhours[$type]["actual"] = $jobcard_all->where('tc_type', $type)->sum('actual_manhours');
                $manhours[$type]["total"] = $jobcard_all->where('tc_type', $type)->sum('estimation_manhour');
                
                if( $jobcard_all->where('status', "open")->where('tc_type', $type)->sum('estimation_manhour') > 0 ) { 
                    $manhours[$type]["estimation_manhour"]["open"] = $jobcard_all->where('status', "open")->where('tc_type', $type)->sum('estimation_manhour'); 
                }else{
                    $manhours[$type]["estimation_manhour"]["open"] = 1;
                }

                if($jobcard_all->where('status', "closed")->where('tc_type', $type)->sum('estimation_manhour') > 0) { 
                    $manhours[$type]["estimation_manhour"]["closed"] = $jobcard_all->where('status', "closed")->where('tc_type', $type)->sum('estimation_manhour'); 
                }else{
                    $manhours[$type]["estimation_manhour"]["closed"] = 1;
                }

                if($jobcard_all->where('status', "pending")->where('tc_type', $type)->sum('estimation_manhour') > 0) { 
                    $manhours[$type]["estimation_manhour"]["pending"] = $jobcard_all->where('status', "pending")->where('tc_type', $type)->sum('estimation_manhour'); 
                }else{
                    $manhours[$type]["estimation_manhour"]["pending"] = 1;
                }

                if($jobcard_all->where('status', "progress")->where('tc_type', $type)->sum('estimation_manhour') > 0) { 
                    $manhours[$type]["estimation_manhour"]["progress"] = $jobcard_all->where('status', "progress")->where('tc_type', $type)->sum('estimation_manhour'); 
                }else{
                    $manhours[$type]["estimation_manhour"]["progress"] = 1;
                }

                if($jobcard_all->where('status', "released")->where('tc_type', $type)->sum('estimation_manhour') > 0) { 
                    $manhours[$type]["estimation_manhour"]["released"] = $jobcard_all->where('status', "released")->where('tc_type', $type)->sum('estimation_manhour'); 
                }else{
                    $manhours[$type]["estimation_manhour"]["released"] = 1;
                }

                if($jobcard_all->where('status', "rii-released")->where('tc_type', $type)->sum('estimation_manhour') > 0) { 
                    $manhours[$type]["estimation_manhour"]["rii-released"] = $jobcard_all->where('status', "rii-released")->where('tc_type', $type)->sum('estimation_manhour'); 
                }else{
                    $manhours[$type]["estimation_manhour"]["rii-released"] = 1;
                }


                $manhours[$type]["actual_manhour"]["open"] = $jobcard_all->where('status', "open")->where('tc_type', $type)->sum('actual_manhours');
                $manhours[$type]["actual_manhour"]["closed"] = $jobcard_all->where('status', "closed")->where('tc_type', $type)->sum('actual_manhours');
                $manhours[$type]["actual_manhour"]["pending"] = $jobcard_all->where('status', "pending")->where('tc_type', $type)->sum('actual_manhours');
                $manhours[$type]["actual_manhour"]["progress"] = $jobcard_all->where('status', "progress")->where('tc_type', $type)->sum('actual_manhours');
                $manhours[$type]["actual_manhour"]["released"] = $jobcard_all->where('status', "released")->where('tc_type', $type)->sum('actual_manhours');
                $manhours[$type]["actual_manhour"]["rii-released"] = $jobcard_all->where('status', "rii-released")->where('tc_type', $type)->sum('actual_manhours');
            }
        }

        $manhours['adsb'] = [];
        if (isset($manhours['ad']) && isset($manhours['sb'])) {
            foreach ($manhours['ad'] as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $key2 => $value2) {
                    $manhours['adsb'][$key][$key2] = $manhours['ad'][$key][$key2] + $manhours['sb'][$key][$key2];
                    }
                } else {
                    $manhours['adsb'][$key] = $manhours['ad'][$key] + $manhours['sb'][$key];
                }
            }
        }elseif(isset($manhours['ad'])){
            $manhours['adsb'] = $manhours['ad'];
        }elseif(isset($manhours['sb'])){
            $manhours['adsb'] = $manhours['sb'];
        }

        $manhours['cmr-awl'] = [];
        if (isset($manhours['cmr']) && isset($manhours['awl'])) {
            foreach ($manhours['cmr'] as $key => $value) {
                if (is_array($value)) {
                    foreach ($value as $key2 => $value2) {
                    $manhours['cmr-awl'][$key][$key2] = $manhours['cmr'][$key][$key2] + $manhours['awl'][$key][$key2];
                    }
                } else {
                    $manhours['cmr-awl'][$key] = $manhours['cmr'][$key] + $manhours['awl'][$key];
                }
            }
        }elseif(isset($manhours['cmr'])){
            $manhours['cmr-awl'] = $manhours['cmr'];
        }elseif(isset($manhours['awl'])){
            $manhours['cmr-awl'] = $manhours['awl'];
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
        $this->counting($additional, "additionals");


        if (isset($this->col["routine"]) && sizeof(array_unique($this->col["routine"])) !== 0) {
            $this->col["routine"] = 12 / sizeof( array_unique( $this->col["routine"] ) );
        }else{
            $this->col["routine"] = 12;
        }

        if (isset($this->col["non-routine"]) && sizeof( $this->col["non-routine"]) > 2) {
            $this->col["non-routine"] = floor( ( 12 / sizeof( array_unique( $this->col["non-routine"] ) ) ) * 2 );
        }elseif (sizeof( $this->col["non-routine"]) == 2 || sizeof( $this->col["non-routine"]) == 3) {
            $this->col["non-routine"] = 6;
        }else {
            $this->col["non-routine"] = 12;
        }

       
        return view('frontend.work-progress-report.show',[
            'col' => $this->col,
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
        $quotation_ids = Quotation::where('quotationable_id', $project->id)->pluck('id')->toArray();
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
        if( isset($count_each["released"]) ){ $data[4]['value'] = $count_each["pending"]; } else{ $data[4]['value'] = 0; }
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
        $quotation_ids = Quotation::where('quotationable_id', $project->id)->pluck('id')->toArray();

        $jobcards = JobCard::whereIn('quotation_id', $quotation_ids)->with('progresses','jobcardable')
        ->where('jobcardable_type', 'App\Models\TaskCard')
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

        $quotation_ids = Quotation::where('quotationable_id', $project->id)->pluck('id')->toArray();

        $jobcards = JobCard::whereIn('quotation_id', $quotation_ids)->with('progresses','jobcardable.eo_header.type')
        ->where('jobcardable_type', 'App\Models\EOInstruction')
        // ->whereHas('jobcardable.type', function ($taskcard) {
        //     $taskcard->where('of', 'taskcard-type-non-routine');
        // })
        ->get();

        foreach($jobcards as $key => $jobcard){
            if($jobcard->jobcardable->eo_header->type->of == 'taskcard-type-non-routine'){
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
                $code = Status::find($key)->code;
                if (strpos($code, 'removal-') !== false) {
                    $code = str_replace('removal-','',$code);
                }
                if (strpos($code, 'installation-') !== false) {
                    $code = str_replace('installation-','',$code);
                }
                $counter[$code] = $value;
            }
        
            if( isset($counter["open"]) ){ $container['open'] = $counter["open"]; } else{ $container["open"] = 0; }
            if( isset($counter["progress"]) ){ $container["progress"] = $counter["progress"]; } else{ $container["progress"] = 0; }
            if( isset($counter["pending"]) ){ $container["pending"] = $counter["pending"]; } else{ $container["pending"] = 0; }
            if( isset($counter["closed"]) ){ $container["closed"] = $counter["closed"]; } else{ $container["closed"] = 0; }
            if( isset($counter["released"]) ){ $container["released"] = $counter["released"]; } else{ $container["released"] = 0; }
            if( isset($counter["rii-released"]) ){ $container["rii-released "] = $counter["rii-released"]; } else{ $container["rii-released"] = 0; }
            if( $container["released"] > 0 || $container["rii-released"] > 0 ){ $container["done"] = $container["rii-released"] + $container["released"]; } else{ $container["done"] = 0; }
            $this->jobcard[$attribute] = $container;
            switch($attribute){
                case 'basic':
                    array_push($this->col["routine"], $attribute);
                    break;
                case 'sip':
                    array_push($this->col["routine"], $attribute);
                    break;
                case 'cpcp':
                    array_push($this->col["routine"], $attribute);
                    break;
                case 'adsb':
                    array_push($this->col["non-routine"], $attribute);
                    break;
                case 'ea':
                    array_push($this->col["non-routine"], $attribute);
                    break;
                case 'eo':
                    array_push($this->col["non-routine"], $attribute);
                    break;
                case 'si':
                    array_push($this->col["non-routine"], $attribute);
                    break;
                case 'cmr-awl':
                    array_push($this->col["non-routine"], $attribute);
                    break;
                case 'ht-crr':
                    array_push($this->col["non-routine"], $attribute);
                    break;
                default:
                    return;
            }
            
            return;
        }else{
            // $container = [];
            // if( isset($counter["open"]) ){ $container['open'] = $counter["open"]; } else{ $container["open"] = 0; }
            // if( isset($counter["progress"]) ){ $container["progress"] = $counter["progress"]; } else{ $container["progress"] = 0; }
            // if( isset($counter["pending"]) ){ $container["pending"] = $counter["pending"]; } else{ $container["pending"] = 0; }
            // if( isset($counter["closed"]) ){ $container["closed"] = $counter["closed"]; } else{ $container["closed"] = 0; }
            // if( isset($counter["released"]) ){ $container["released"] = $counter["released"]; } else{ $container["released"] = 0; }
            // if( isset($counter["rii-released"]) ){ $container["rii-released "] = $counter["rii-released"]; } else{ $container["rii-released"] = 0; }
            // if( $container["released"] > 0 || $container["rii-released"] > 0 ){ $container["done"] = $container["rii-released"] + $container["released"]; } else{ $container["done"] = 0; }
            // $this->jobcard[$attribute] = $container;

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
                            $manhours += + $diff;
                        }elseif($this->statuses->where('id',$value->status_id)->first()->code == "progress" ) {
                            $t1 = Carbon::now($date1);
                            $t2 = Carbon::parse($value->created_at);
                            $diff = $t1->diffInSeconds($t2);
                            $manhours += + $diff;
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
                                $manhours_break += $diff;
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