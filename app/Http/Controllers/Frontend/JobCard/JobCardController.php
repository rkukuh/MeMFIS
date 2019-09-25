<?php

namespace App\Http\Controllers\Frontend\JobCard;

use Auth;
use App\User;
use Validator;
use Carbon\Carbon;
use App\Models\Status;
use App\Models\JobCard;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobCardStore;
use App\Http\Requests\Frontend\JobCardUpdate;

class JobCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.job-card.index');
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
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function show(JobCard $jobCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function edit(JobCard $jobcard)
    {
         //TODO Validasi User'skill with HtCrr Skill
        if($jobcard->progresses->first()->progressed_by == Auth::id()){
            $error_notification = array(
                'message' => "You can't run this taskcard",
                'title' => "Danger",
                'alert-type' => "error"
            );
            return redirect()->route('frontend.jobcard.hardtime.index')->with($error_notification);
        }else{
            if($jobcard->jobcardable_type == "App\Models\TaskCard"){
                //TODO Validasi User'skill with JobCard Skill
                foreach($jobcard->helpers as $helper){
                    $helper->userID .= $helper->user->id;
                }
                if($jobcard->helpers->where('userID',Auth::id())->first() == null){
                    return redirect()->route('frontend.jobcard-engineer.edit',$jobcard->uuid);
                }
                else{
                    return redirect()->route('frontend.jobcard-mechanic.edit',$jobcard->uuid);
                }
            }else if($jobcard->jobcardable_type == "App\Models\EOInstruction"){
                //TODO Validasi User'skill with JobCard Skill
                foreach($jobcard->helpers as $helper){
                    $helper->userID .= $helper->user->id;
                }
                if($jobcard->helpers->where('userID',Auth::id())->first() == null){
                    return redirect()->route('frontend.jobcard-eo-engineer.edit',$jobcard->uuid);
                }
                else{
                    return redirect()->route('frontend.jobcard-eo-mechanic.edit',$jobcard->uuid);
                }
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\JobCardUpdate  $request
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function update(JobCardUpdate $request, JobCard $jobCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobCard $jobCard)
    {
        //
    }

     /**
     * Search the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number' => 'required|exists:jobcards,number'
          ]);

          if ($validator->fails()) {
            return
            redirect()->route('frontend.jobcard.index')->withErrors($validator)->withInput();
          }

        $search = JobCard::where('number',$request->number)->first();

        return redirect()->route('frontend.jobcard.edit',$search->uuid);
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function print($jobCard)
    {

        $statuses = Status::ofJobCard()->get();
        $jobcard = JobCard::with('jobcardable','quotation')->where('uuid',$jobCard)->first();
        foreach($jobcard->helpers as $helper){
            $helper->userID .= $helper->user->id;
        }
        $manhours = null;
        foreach($jobcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
            $date1 = null;
            foreach($values as $value){
                if($statuses->where('id',$value->status_id)->first()->code <> "open" or $statuses->where('id',$value->status_id)->first()->code <> "released" or $statuses->where('id',$value->status_id)->first()->code <> "rii-released"){
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
        $manhours_break = null;
        foreach($jobcard->progresses->groupby('progressed_by')->sortBy('created_at') as $key => $values){
            for($i=0; $i<sizeOf($values->toArray()); $i++){
                if($statuses->where('id',$values[$i]->status_id)->first()->code == "pending"){
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

        if($jobcard->jobcardable_type == "App\Models\TaskCard"){

            $rii_status = $jobcard->jobcardable->is_rii;
            $helpers = $jobcard->helpers;
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobcard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobcard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            if(sizeof($jobcard->approvals)==0){
                $inspected_by = "-";
                $inspected_at = "-";
            }
            else{
                $inspected_by = User::find($jobcard->approvals->first()->conducted_by)->name;
                $inspected_at = $jobcard->approvals->first()->created_at;
            }

            if(sizeof($jobcard->approvals)==1 or sizeof($jobcard->approvals)==0){
                $rii_by = "-";
                $rii_at = "-";
            }
            else{
                $rii_by = User::find($jobcard->approvals->get(1)->conducted_by)->name;
                $rii_at = $jobcard->approvals->get(1)->created_at;
            }

            if(sizeof($jobcard->progresses)>=0 and sizeof($jobcard->progresses)<=1){
                $accomplished_by = "-";
                $accomplished_at = "-";
            }else{
                $accomplished_by =  User::find($jobcard->progresses->get(1)->progressed_by)->name;
                $accomplished_at =  $jobcard->progresses->get(1)->created_at;
            }

            if(isset(User::find($jobcard->quotation->quotationable->audits->first()->user_id)->name)){
                $prepared_by = User::find($jobcard->quotation->quotationable->audits->first()->user_id)->name;
            }else{
                $prepared_by ="-";
            }

            if($jobcard->jobcardable->type->code == "basic"){

                $pdf = \PDF::loadView('frontend/form/jobcard_basic',[
                        'jobCard' => $jobcard,
                        'username' => $username,
                        'lastStatus' => $lastStatus,
                        'dateClosed' => $dateClosed,
                        'accomplished_by' => $accomplished_by,
                        'accomplished_at' => $accomplished_at,
                        'inspected_by' => $inspected_by,
                        'inspected_at' => $inspected_at,
                        'rii_by' => $rii_by,
                        'rii_at' => $rii_at,
                        'prepared_by' => $prepared_by,
                        'rii_status' => $rii_status,
                        'helpers' => $helpers,
                        'actual_manhours'=> $actual_manhours
                        ]);
                return $pdf->stream();
            }
            elseif($jobcard->jobcardable->type->code == "sip"){

                $pdf = \PDF::loadView('frontend/form/jobcard_sip',[
                        'jobCard' => $jobcard,
                        'username' => $username,
                        'lastStatus' => $lastStatus,
                        'dateClosed' => $dateClosed,
                        'accomplished_by' => $accomplished_by,
                        'accomplished_at' => $accomplished_at,
                        'inspected_by' => $inspected_by,
                        'inspected_at' => $inspected_at,
                        'rii_by' => $rii_by,
                        'rii_at' => $rii_at,
                        'prepared_by' => $prepared_by,
                        'rii_status' => $rii_status,
                        'helpers' => $helpers,
                        'actual_manhours'=> $actual_manhours
                        ]);
                return $pdf->stream();
            }
            elseif($jobcard->jobcardable->type->code == "cpcp"){

                $pdf = \PDF::loadView('frontend/form/jobcard_cpcp',[
                        'jobCard' => $jobcard,
                        'username' => $username,
                        'lastStatus' => $lastStatus,
                        'dateClosed' => $dateClosed,
                        'accomplished_by' => $accomplished_by,
                        'accomplished_at' => $accomplished_at,
                        'inspected_by' => $inspected_by,
                        'inspected_at' => $inspected_at,
                        'rii_by' => $rii_by,
                        'rii_at' => $rii_at,
                        'prepared_by' => $prepared_by,
                        'rii_status' => $rii_status,
                        'helpers' => $helpers,
                        'actual_manhours'=> $actual_manhours
                        ]);
                return $pdf->stream();
            }
            elseif($jobcard->jobcardable->type->code == "si"){

            $pdf = \PDF::loadView('frontend/form/jobcard_si',[
                    'jobCard' => $jobcard,
                    'username' => $username,
                    'lastStatus' => $lastStatus,
                    'dateClosed' => $dateClosed,
                    'accomplished_by' => $accomplished_by,
                    'accomplished_at' => $accomplished_at,
                    'inspected_by' => $inspected_by,
                    'inspected_at' => $inspected_at,
                    'rii_by' => $rii_by,
                    'rii_at' => $rii_at,
                    'prepared_by' => $prepared_by,
                    'rii_status' => $rii_status,
                    'helpers' => $helpers,
                    'actual_manhours'=> $actual_manhours
                    ]);
                return $pdf->stream();
            }
            elseif($jobcard->jobcardable->type->code == "preliminary"){

                $pdf = \PDF::loadView('frontend/form/preliminaryinspection-one',[
                        'jobCard' => $jobcard,
                        'username' => $username,
                        'lastStatus' => $lastStatus,
                        'dateClosed' => $dateClosed,
                        'accomplished_by' => $accomplished_by,
                        'accomplished_at' => $accomplished_at,
                        'inspected_by' => $inspected_by,
                        'inspected_at' => $inspected_at,
                        'rii_by' => $rii_by,
                        'rii_at' => $rii_at,
                        'prepared_by' => $prepared_by,
                        'rii_status' => $rii_status,
                        'helpers' => $helpers,
                        'actual_manhours'=> $actual_manhours
                        ]);
                return $pdf->stream();
            }
        }elseif($jobcard->jobcardable_type == "App\Models\EOInstruction"){

            $rii_status = $jobcard->jobcardable->is_rii;
            $helpers = $jobcard->helpers;
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobcard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobcard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            if(sizeof($jobcard->approvals)==0){
                $inspected_by = "-";
                $inspected_at = "-";
            }
            else{
                $inspected_by = User::find($jobcard->approvals->first()->conducted_by)->name;
                $inspected_at = $jobcard->approvals->first()->created_at;
            }

            if(sizeof($jobcard->approvals)==1 or sizeof($jobcard->approvals)==0){
                $rii_by = "-";
                $rii_at = "-";
            }
            else{
                $rii_by = User::find($jobcard->approvals->get(1)->conducted_by)->name;
                $rii_at = $jobcard->approvals->get(1)->created_at;
            }

            if(sizeof($jobcard->progresses)>=0 and sizeof($jobcard->progresses)<=1){
                $accomplished_by = "-";
                $accomplished_at = "-";
            }else{
                $accomplished_by =  User::find($jobcard->progresses->get(1)->progressed_by)->name;
                $accomplished_at =  $jobcard->progresses->get(1)->created_at;
            }

            if(isset(User::find($jobcard->quotation->quotationable->audits->first()->user_id)->name)){
                $prepared_by = User::find($jobcard->quotation->quotationable->audits->first()->user_id)->name;
            }else{
                $prepared_by ="-";
            }

            if(($jobcard->jobcardable->eo_header->type->code == "ad") or ($jobcard->jobcardable->eo_header->type->code == "sb")) {
                $pdf = \PDF::loadView('frontend/form/jobcard_adsb',[
                            'jobCard' => $jobcard,
                            'username' => $username,
                            'lastStatus' => $lastStatus,
                            'dateClosed' => $dateClosed,
                            'accomplished_by' => $accomplished_by,
                            'accomplished_at' => $accomplished_at,
                            'inspected_by' => $inspected_by,
                            'inspected_at' => $inspected_at,
                            'rii_by' => $rii_by,
                            'rii_at' => $rii_at,
                            'prepared_by' => $prepared_by,
                            'rii_status' => $rii_status,
                            'helpers' => $helpers,
                            'actual_manhours'=> $actual_manhours
                        ]);
                    return $pdf->stream();
            }
            elseif(($jobcard->jobcardable->eo_header->type->code == "cmr") or ($jobcard->jobcardable->eo_header->type->code == "awl")){
                $pdf = \PDF::loadView('frontend/form/jobcard_cmrawl',[
                            'jobCard' => $jobcard,
                            'username' => $username,
                            'lastStatus' => $lastStatus,
                            'dateClosed' => $dateClosed,
                            'accomplished_by' => $accomplished_by,
                            'accomplished_at' => $accomplished_at,
                            'inspected_by' => $inspected_by,
                            'inspected_at' => $inspected_at,
                            'rii_by' => $rii_by,
                            'rii_at' => $rii_at,
                            'prepared_by' => $prepared_by,
                            'rii_status' => $rii_status,
                            'helpers' => $helpers,
                            'actual_manhours'=> $actual_manhours
                        ]);
                    return $pdf->stream();
            }
            elseif(($jobcard->jobcardable->eo_header->type->code == "eo") or ($jobcard->jobcardable->eo_header->type->code == "ea")){
                if(sizeOf($jobcard->jobcardable->materials->toArray())<2 and sizeOf($jobcard->jobcardable->tools->toArray())<2){
                    $pdf = \PDF::loadView('frontend/form/jobcard_eo_1page',[
                        'jobCard' => $jobcard,
                        'username' => $username,
                        'lastStatus' => $lastStatus,
                        'dateClosed' => $dateClosed,
                        'accomplished_by' => $accomplished_by,
                        'accomplished_at' => $accomplished_at,
                        'inspected_by' => $inspected_by,
                        'inspected_at' => $inspected_at,
                        'rii_by' => $rii_by,
                        'rii_at' => $rii_at,
                        'prepared_by' => $prepared_by,
                        'rii_status' => $rii_status,
                        'helpers' => $helpers,
                        'actual_manhours'=> $actual_manhours
                    ]);
                return $pdf->stream();
                }else{
                    $pdf = \PDF::loadView('frontend/form/jobcard_eo_2page',[
                        'jobCard' => $jobcard,
                        'username' => $username,
                        'lastStatus' => $lastStatus,
                        'dateClosed' => $dateClosed,
                        'accomplished_by' => $accomplished_by,
                        'accomplished_at' => $accomplished_at,
                        'inspected_by' => $inspected_by,
                        'inspected_at' => $inspected_at,
                        'rii_by' => $rii_by,
                        'rii_at' => $rii_at,
                        'prepared_by' => $prepared_by,
                        'rii_status' => $rii_status,
                        'helpers' => $helpers,
                        'actual_manhours'=> $actual_manhours
                    ]);

                }
            }
        }
    }
}
