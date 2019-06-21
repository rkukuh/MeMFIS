<?php

namespace App\Http\Controllers\Frontend\JobCardHardTime;

use Auth;
use App\Models\Status;
use App\Models\JobCard;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobCardStore;
use App\Http\Requests\Frontend\JobCardUpdate;

class JobCardHardTimeController extends Controller
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
            }else{
                $dateClosed = "-";
            }
            $pdf = \PDF::loadView('frontend/form/jobcard_eo',[
                    'jobCard' => $jobCard,
                    'username' => $username,
                    'lastStatus' => $lastStatus,
                    'dateClosed' => $dateClosed
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
