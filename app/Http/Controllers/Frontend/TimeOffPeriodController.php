<?php

namespace App\Http\Controllers\Frontend;

use App\Models\TimeOffPeriod;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\TimeOffPeriodStore;
use App\Http\Requests\Frontend\TimeOffPeriodUpdate;

class TimeOffPeriodController extends Controller
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
     * @param  \App\Http\Requests\Frontend\TimeOffPeriodStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeOffPeriodStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeOffPeriod  $timeOffPeriod
     * @return \Illuminate\Http\Response
     */
    public function show(TimeOffPeriod $timeOffPeriod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeOffPeriod  $timeOffPeriod
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeOffPeriod $timeOffPeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\TimeOffPeriodUpdate  $request
     * @param  \App\Models\TimeOffPeriod  $timeOffPeriod
     * @return \Illuminate\Http\Response
     */
    public function update(TimeOffPeriodUpdate $request, TimeOffPeriod $timeOffPeriod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeOffPeriod  $timeOffPeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeOffPeriod $timeOffPeriod)
    {
        //
    }
}
