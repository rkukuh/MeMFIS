<?php

namespace App\Http\Controllers\Frontend\JobCard;

use App\Models\JobCard;
use App\Models\TaskCard;
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
        $jobCard = TaskCard::with('type','aircrafts','task')->where('uuid',$jobCard)->first();

        if($jobCard->type->code == "basic"){
            $pdf = \PDF::loadView('frontend/form/jobcard_basic');
            return $pdf->stream();
        }
        elseif($jobCard->type->code == "sip"){
            $pdf = \PDF::loadView('frontend/form/jobcard_sip');
            return $pdf->stream();
        }
        elseif($jobCard->type->code == "cpcp"){
            $pdf = \PDF::loadView('frontend/form/jobcard_cpcp');
            return $pdf->stream();
        }
        elseif (($jobCard->type->code == "ad") or ($jobCard->type->code == "sb")) {
            $pdf = \PDF::loadView('frontend/form/jobcard_adsb');
            return $pdf->stream();        }
        elseif($jobCard->type->code == "eo"){
            $pdf = \PDF::loadView('frontend/form/jobcard_eo2');
            return $pdf->stream();
        }
        elseif(($jobCard->type->code == "cmr") or ($jobCard->type->code == "awl")){
            $pdf = \PDF::loadView('frontend/form/jobcard_cmrawl');
            return $pdf->stream();
        }
        elseif($jobCard->type->code == "si"){
            $pdf = \PDF::loadView('frontend/form/jobcard_si');
            return $pdf->stream();
        }
        elseif($jobCard->type->code == "preliminary"){
            $pdf = \PDF::loadView('frontend/form/preliminaryinspection-one');
            return $pdf->stream();
        } else {
            // || ($jobCard->type->code == "ea") || ($jobCard->type->code == "htcrr") ||
        }
    }
}
