<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ScheduledPayment;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ScheduledPaymentStore;
use App\Http\Requests\Frontend\ScheduledPaymentUpdate;

class ScheduledPaymentController extends Controller
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
     * @param  \App\Http\Requests\Frontend\ScheduledPaymentStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduledPaymentStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScheduledPayment  $scheduledPayment
     * @return \Illuminate\Http\Response
     */
    public function show(ScheduledPayment $scheduledPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScheduledPayment  $scheduledPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(ScheduledPayment $scheduledPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ScheduledPaymentUpdate  $request
     * @param  \App\Models\ScheduledPayment  $scheduledPayment
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduledPaymentUpdate $request, ScheduledPayment $scheduledPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScheduledPayment  $scheduledPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScheduledPayment $scheduledPayment)
    {
        //
    }
}
