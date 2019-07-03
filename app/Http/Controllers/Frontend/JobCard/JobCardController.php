<?php

namespace App\Http\Controllers\Frontend\JobCard;

use Auth;
use App\User;
use Validator;
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
        $jobCard = JobCard::with('taskcard','quotation')->whereHas('taskcard', function ($query) use ($jobCard) {
            $query->where('uuid',$jobCard);
        })->first();

        if($jobCard->taskcard->type->code == "basic"){
            $rii_status = $jobCard->taskcard->is_rii;
            $helpers = $jobCard->helpers;
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobCard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobCard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            if(sizeof($jobCard->approvals)==0){
                $inspected_by = "-";
                $inspected_at = "-";
            }
            else{
                $inspected_by = User::find($jobCard->approvals->first()->approved_by)->name;
                $inspected_at = $jobCard->approvals->first()->created_at;
            }

            if(sizeof($jobCard->approvals)==1 or sizeof($jobCard->approvals)==0){
                $rii_by = "-";
                $rii_at = "-";
            }
            else{
                $rii_by = User::find($jobCard->approvals->get(1)->approved_by)->name;
                $rii_at = $jobCard->approvals->get(1)->created_at;
            }

            if(sizeof($jobCard->progresses)>=0 and sizeof($jobCard->progresses)<=1){
                $accomplished_by = "-";
                $accomplished_at = "-";
            }else{
                $accomplished_by =  User::find($jobCard->progresses->get(1)->progressed_by)->name;
                $accomplished_at =  $jobCard->progresses->get(1)->created_at;
            }

            if(isset(User::find($jobCard->quotation->project->audits->first()->user_id)->name)){
                $prepared_by = User::find($jobCard->quotation->project->audits->first()->user_id)->name;
            }else{
                $prepared_by ="-";
            }

            $pdf = \PDF::loadView('frontend/form/jobcard_basic',[
                    'jobCard' => $jobCard,
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
                    'helpers' => $helpers
                    ]);
            return $pdf->stream();
        }
        elseif($jobCard->taskcard->type->code == "sip"){
            $rii_status = $jobCard->taskcard->is_rii;
            $helpers = $jobCard->helpers;
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobCard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobCard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            if(sizeof($jobCard->approvals)==0){
                $inspected_by = "-";
                $inspected_at = "-";
            }
            else{
                $inspected_by = User::find($jobCard->approvals->first()->approved_by)->name;
                $inspected_at = $jobCard->approvals->first()->created_at;
            }

            if(sizeof($jobCard->approvals)==1 or sizeof($jobCard->approvals)==0){
                $rii_by = "-";
                $rii_at = "-";
            }
            else{
                $rii_by = User::find($jobCard->approvals->get(1)->approved_by)->name;
                $rii_at = $jobCard->approvals->get(1)->created_at;
            }

            if(sizeof($jobCard->progresses)>=0 and sizeof($jobCard->progresses)<=1){
                $accomplished_by = "-";
                $accomplished_at = "-";
            }else{
                $accomplished_by =  User::find($jobCard->progresses->get(1)->progressed_by)->name;
                $accomplished_at =  $jobCard->progresses->get(1)->created_at;
            }

            if(isset(User::find($jobCard->quotation->project->audits->first()->user_id)->name)){
                $prepared_by = User::find($jobCard->quotation->project->audits->first()->user_id)->name;
            }else{
                $prepared_by ="-";
            }

            $pdf = \PDF::loadView('frontend/form/jobcard_sip',[
                    'jobCard' => $jobCard,
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
                    'helpers' => $helpers
                    ]);
            return $pdf->stream();
        }
        elseif($jobCard->taskcard->type->code == "cpcp"){
            $rii_status = $jobCard->taskcard->is_rii;
            $helpers = $jobCard->helpers;
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobCard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobCard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            if(sizeof($jobCard->approvals)==0){
                $inspected_by = "-";
                $inspected_at = "-";
            }
            else{
                $inspected_by = User::find($jobCard->approvals->first()->approved_by)->name;
                $inspected_at = $jobCard->approvals->first()->created_at;
            }

            if(sizeof($jobCard->approvals)==1 or sizeof($jobCard->approvals)==0){
                $rii_by = "-";
                $rii_at = "-";
            }
            else{
                $rii_by = User::find($jobCard->approvals->get(1)->approved_by)->name;
                $rii_at = $jobCard->approvals->get(1)->created_at;
            }

            if(sizeof($jobCard->progresses)>=0 and sizeof($jobCard->progresses)<=1){
                $accomplished_by = "-";
                $accomplished_at = "-";
            }else{
                $accomplished_by =  User::find($jobCard->progresses->get(1)->progressed_by)->name;
                $accomplished_at =  $jobCard->progresses->get(1)->created_at;
            }

            if(isset(User::find($jobCard->quotation->project->audits->first()->user_id)->name)){
                $prepared_by = User::find($jobCard->quotation->project->audits->first()->user_id)->name;
            }else{
                $prepared_by ="-";
            }

            $pdf = \PDF::loadView('frontend/form/jobcard_cpcp',[
                    'jobCard' => $jobCard,
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
                    'helpers' => $helpers
                    ]);
            return $pdf->stream();
        }
        elseif (($jobCard->taskcard->type->code == "ad") or ($jobCard->taskcard->type->code == "sb")) {
            $rii_status = $jobCard->taskcard->is_rii;
            $helpers = $jobCard->helpers;
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobCard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobCard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            if(sizeof($jobCard->approvals)==0){
                $inspected_by = "-";
                $inspected_at = "-";
            }
            else{
                $inspected_by = User::find($jobCard->approvals->first()->approved_by)->name;
                $inspected_at = $jobCard->approvals->first()->created_at;
            }

            if(sizeof($jobCard->approvals)==1 or sizeof($jobCard->approvals)==0){
                $rii_by = "-";
                $rii_at = "-";
            }
            else{
                $rii_by = User::find($jobCard->approvals->get(1)->approved_by)->name;
                $rii_at = $jobCard->approvals->get(1)->created_at;
            }

            if(sizeof($jobCard->progresses)>=0 and sizeof($jobCard->progresses)<=1){
                $accomplished_by = "-";
                $accomplished_at = "-";
            }else{
                $accomplished_by =  User::find($jobCard->progresses->get(1)->progressed_by)->name;
                $accomplished_at =  $jobCard->progresses->get(1)->created_at;
            }

            if(isset(User::find($jobCard->quotation->project->audits->first()->user_id)->name)){
                $prepared_by = User::find($jobCard->quotation->project->audits->first()->user_id)->name;
            }else{
                $prepared_by ="-";
            }

            $pdf = \PDF::loadView('frontend/form/jobcard_adsb',[
                    'jobCard' => $jobCard,
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
                    'helpers' => $helpers
                    ]);
            return $pdf->stream();        }
        elseif(($jobCard->taskcard->type->code == "eo") or ($jobCard->taskcard->type->code == "ea")){
            $rii_status = $jobCard->taskcard->is_rii;
            $helpers = $jobCard->helpers;
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobCard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobCard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            if(sizeof($jobCard->approvals)==0){
                $inspected_by = "-";
                $inspected_at = "-";
            }
            else{
                $inspected_by = User::find($jobCard->approvals->first()->approved_by)->name;
                $inspected_at = $jobCard->approvals->first()->created_at;
            }

            if(sizeof($jobCard->approvals)==1 or sizeof($jobCard->approvals)==0){
                $rii_by = "-";
                $rii_at = "-";
            }
            else{
                $rii_by = User::find($jobCard->approvals->get(1)->approved_by)->name;
                $rii_at = $jobCard->approvals->get(1)->created_at;
            }

            if(sizeof($jobCard->progresses)>=0 and sizeof($jobCard->progresses)<=1){
                $accomplished_by = "-";
                $accomplished_at = "-";
            }else{
                $accomplished_by =  User::find($jobCard->progresses->get(1)->progressed_by)->name;
                $accomplished_at =  $jobCard->progresses->get(1)->created_at;
            }

            if(isset(User::find($jobCard->quotation->project->audits->first()->user_id)->name)){
                $prepared_by = User::find($jobCard->quotation->project->audits->first()->user_id)->name;
            }else{
                $prepared_by ="-";
            }

            $pdf = \PDF::loadView('frontend/form/jobcard_eo',[
                    'jobCard' => $jobCard,
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
                    'helpers' => $helpers
                    ]);
            return $pdf->stream();
        }
        elseif(($jobCard->taskcard->type->code == "cmr") or ($jobCard->taskcard->type->code == "awl")){
            $rii_status = $jobCard->taskcard->is_rii;
            $helpers = $jobCard->helpers;
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobCard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobCard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            if(sizeof($jobCard->approvals)==0){
                $inspected_by = "-";
                $inspected_at = "-";
            }
            else{
                $inspected_by = User::find($jobCard->approvals->first()->approved_by)->name;
                $inspected_at = $jobCard->approvals->first()->created_at;
            }

            if(sizeof($jobCard->approvals)==1 or sizeof($jobCard->approvals)==0){
                $rii_by = "-";
                $rii_at = "-";
            }
            else{
                $rii_by = User::find($jobCard->approvals->get(1)->approved_by)->name;
                $rii_at = $jobCard->approvals->get(1)->created_at;
            }

            if(sizeof($jobCard->progresses)>=0 and sizeof($jobCard->progresses)<=1){
                $accomplished_by = "-";
                $accomplished_at = "-";
            }else{
                $accomplished_by =  User::find($jobCard->progresses->get(1)->progressed_by)->name;
                $accomplished_at =  $jobCard->progresses->get(1)->created_at;
            }

            if(isset(User::find($jobCard->quotation->project->audits->first()->user_id)->name)){
                $prepared_by = User::find($jobCard->quotation->project->audits->first()->user_id)->name;
            }else{
                $prepared_by ="-";
            }

            $pdf = \PDF::loadView('frontend/form/jobcard_cmrawl',[
                    'jobCard' => $jobCard,
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
                    'helpers' => $helpers
                    ]);
            return $pdf->stream();
        }
        elseif($jobCard->taskcard->type->code == "si"){
            $rii_status = $jobCard->taskcard->is_rii;
            $helpers = $jobCard->helpers;
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobCard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobCard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            if(sizeof($jobCard->approvals)==0){
                $inspected_by = "-";
                $inspected_at = "-";
            }
            else{
                $inspected_by = User::find($jobCard->approvals->first()->approved_by)->name;
                $inspected_at = $jobCard->approvals->first()->created_at;
            }

            if(sizeof($jobCard->approvals)==1 or sizeof($jobCard->approvals)==0){
                $rii_by = "-";
                $rii_at = "-";
            }
            else{
                $rii_by = User::find($jobCard->approvals->get(1)->approved_by)->name;
                $rii_at = $jobCard->approvals->get(1)->created_at;
            }

            if(sizeof($jobCard->progresses)>=0 and sizeof($jobCard->progresses)<=1){
                $accomplished_by = "-";
                $accomplished_at = "-";
            }else{
                $accomplished_by =  User::find($jobCard->progresses->get(1)->progressed_by)->name;
                $accomplished_at =  $jobCard->progresses->get(1)->created_at;
            }

            if(isset(User::find($jobCard->quotation->project->audits->first()->user_id)->name)){
                $prepared_by = User::find($jobCard->quotation->project->audits->first()->user_id)->name;
            }else{
                $prepared_by ="-";
            }

            $pdf = \PDF::loadView('frontend/form/jobcard_si',[
                    'jobCard' => $jobCard,
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
                    'helpers' => $helpers
                    ]);
            return $pdf->stream();
        }
        elseif($jobCard->taskcard->type->code == "preliminary"){
            $rii_status = $jobCard->taskcard->is_rii;
            $helpers = $jobCard->helpers;
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobCard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobCard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            if(sizeof($jobCard->approvals)==0){
                $inspected_by = "-";
                $inspected_at = "-";
            }
            else{
                $inspected_by = User::find($jobCard->approvals->first()->approved_by)->name;
                $inspected_at = $jobCard->approvals->first()->created_at;
            }

            if(sizeof($jobCard->approvals)==1 or sizeof($jobCard->approvals)==0){
                $rii_by = "-";
                $rii_at = "-";
            }
            else{
                $rii_by = User::find($jobCard->approvals->get(1)->approved_by)->name;
                $rii_at = $jobCard->approvals->get(1)->created_at;
            }

            if(sizeof($jobCard->progresses)>=0 and sizeof($jobCard->progresses)<=1){
                $accomplished_by = "-";
                $accomplished_at = "-";
            }else{
                $accomplished_by =  User::find($jobCard->progresses->get(1)->progressed_by)->name;
                $accomplished_at =  $jobCard->progresses->get(1)->created_at;
            }

            if(isset(User::find($jobCard->quotation->project->audits->first()->user_id)->name)){
                $prepared_by = User::find($jobCard->quotation->project->audits->first()->user_id)->name;
            }else{
                $prepared_by ="-";
            }

            $pdf = \PDF::loadView('frontend/form/preliminaryinspection-one',[
                    'jobCard' => $jobCard,
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
                    'helpers' => $helpers
                    ]);
            return $pdf->stream();
        // } else {
            // ($jobCard->type->code == "htcrr") ||
        }
    }
}
