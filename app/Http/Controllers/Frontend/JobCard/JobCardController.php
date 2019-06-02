<?php

namespace App\Http\Controllers\Frontend\JobCard;

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
            $pdf = \PDF::loadView('frontend/form/jobcard_basic',[
                    'jobCard' => $jobCard]);
            return $pdf->stream();
        }
        elseif($jobCard->taskcard->type->code == "sip"){
            $pdf = \PDF::loadView('frontend/form/jobcard_sip',[
                    'jobCard' => $jobCard]);
            return $pdf->stream();
        }
        elseif($jobCard->taskcard->type->code == "cpcp"){
            $pdf = \PDF::loadView('frontend/form/jobcard_cpcp',[
                    'jobCard' => $jobCard]);
            return $pdf->stream();
        }
        elseif (($jobCard->taskcard->type->code == "ad") or ($jobCard->taskcard->type->code == "sb")) {
            $pdf = \PDF::loadView('frontend/form/jobcard_adsb',[
                    'jobCard' => $jobCard]);
            return $pdf->stream();        }
        elseif(($jobCard->taskcard->type->code == "eo") or ($jobCard->taskcard->type->code == "ea")){
            $pdf = \PDF::loadView('frontend/form/jobcard_eo',[
                    'jobCard' => $jobCard]);
            return $pdf->stream();
        }
        elseif(($jobCard->taskcard->type->code == "cmr") or ($jobCard->taskcard->type->code == "awl")){
            $pdf = \PDF::loadView('frontend/form/jobcard_cmrawl',[
                    'jobCard' => $jobCard]);
            return $pdf->stream();
        }
        elseif($jobCard->taskcard->type->code == "si"){
            $pdf = \PDF::loadView('frontend/form/jobcard_si',[
                    'jobCard' => $jobCard]);
            return $pdf->stream();
        }
        elseif($jobCard->taskcard->type->code == "preliminary"){
            $pdf = \PDF::loadView('frontend/form/preliminaryinspection-one',[
                    'jobCard' => $jobCard]);
            return $pdf->stream();
        // } else {
            // ($jobCard->type->code == "htcrr") ||
        }
    }
}
