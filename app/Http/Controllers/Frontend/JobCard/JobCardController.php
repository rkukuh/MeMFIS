<?php

namespace App\Http\Controllers\Frontend\JobCard;

use Auth;
use App\Models\User;
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
        //
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
    public function edit(JobCard $jobCard)
    {
       //
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
    public function print($jobCard)
    {
        $jobCard = JobCard::with('taskcard','quotation')->whereHas('taskcard', function ($query) use ($jobCard) {
            $query->where('uuid',$jobCard);
        })->first();

        if($jobCard->taskcard->type->code == "basic"){
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobCard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobCard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            $pdf = \PDF::loadView('frontend/form/jobcard_basic',[
                    'jobCard' => $jobCard,
                    'username' => $username,
                    'lastStatus' => $lastStatus,
                    'dateClosed' => $dateClosed
                    ]);
            return $pdf->stream();
        }
        elseif($jobCard->taskcard->type->code == "sip"){
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobCard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobCard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            $pdf = \PDF::loadView('frontend/form/jobcard_sip',[
                    'jobCard' => $jobCard,
                    'username' => $username,
                    'lastStatus' => $lastStatus,
                    'dateClosed' => $dateClosed
                    ]);
            return $pdf->stream();
        }
        elseif($jobCard->taskcard->type->code == "cpcp"){
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobCard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobCard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            $pdf = \PDF::loadView('frontend/form/jobcard_cpcp',[
                    'jobCard' => $jobCard,
                    'username' => $username,
                    'lastStatus' => $lastStatus,
                    'dateClosed' => $dateClosed
                    ]);
            return $pdf->stream();
        }
        elseif (($jobCard->taskcard->type->code == "ad") or ($jobCard->taskcard->type->code == "sb")) {
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobCard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobCard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            $pdf = \PDF::loadView('frontend/form/jobcard_adsb',[
                    'jobCard' => $jobCard,
                    'username' => $username,
                    'lastStatus' => $lastStatus,
                    'dateClosed' => $dateClosed
                    ]);
            return $pdf->stream();        }
        elseif(($jobCard->taskcard->type->code == "eo") or ($jobCard->taskcard->type->code == "ea")){
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobCard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobCard->progresses->last()->created_at;
                $rii_by = User::find($jobCard->approvals->get(1)->approved_by)->name;
                $rii_at = $jobCard->approvals->get(1)->created_at;

            }else{
                $dateClosed = "-";
                $rii_by = "-";
            }

            $inspected_by = User::find($jobCard->approvals->first()->approved_by)->name;
            $inspected_at = $jobCard->approvals->first()->created_at;
            $accomplished_by =  User::find($jobCard->progresses->last()->progressed_by)->name;
            $accomplished_at =  $jobCard->progresses->last()->created_at;
            $prepared_by = User::find($jobCard->quotation->project->audits->first()->user_id)->name;;

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
                    'prepared_by' => $prepared_by
                    ]);
            return $pdf->stream();
        }
        elseif(($jobCard->taskcard->type->code == "cmr") or ($jobCard->taskcard->type->code == "awl")){
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobCard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobCard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            $pdf = \PDF::loadView('frontend/form/jobcard_cmrawl',[
                    'jobCard' => $jobCard,
                    'username' => $username,
                    'lastStatus' => $lastStatus,
                    'dateClosed' => $dateClosed
                    ]);
            return $pdf->stream();
        }
        elseif($jobCard->taskcard->type->code == "si"){
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobCard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobCard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            $pdf = \PDF::loadView('frontend/form/jobcard_si',[
                    'jobCard' => $jobCard,
                    'username' => $username,
                    'lastStatus' => $lastStatus,
                    'dateClosed' => $dateClosed
                    ]);
            return $pdf->stream();
        }
        elseif($jobCard->taskcard->type->code == "preliminary"){
            $username = Auth::user()->name;
            $lastStatus = Status::where('id',$jobCard->progresses->last()->status_id)->first()->name;
            if($lastStatus == "CLOSED"){
                $dateClosed = $jobCard->progresses->last()->created_at;
            }else{
                $dateClosed = "-";
            }
            $pdf = \PDF::loadView('frontend/form/preliminaryinspection-one',[
                    'jobCard' => $jobCard,
                    'username' => $username,
                    'lastStatus' => $lastStatus,
                    'dateClosed' => $dateClosed
                    ]);
            return $pdf->stream();
        // } else {
            // ($jobCard->type->code == "htcrr") ||
        }
    }
}
