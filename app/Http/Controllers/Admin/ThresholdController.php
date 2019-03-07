<?php

namespace App\Http\Controllers\Admin;

use App\Models\Threshold;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ThresholdStore;
use App\Http\Requests\Admin\ThresholdUpdate;

class ThresholdController extends Controller
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
     * @param  \App\Http\Requests\Admin\ThresholdStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThresholdStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Threshold  $threshold
     * @return \Illuminate\Http\Response
     */
    public function show(Threshold $threshold)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Threshold  $threshold
     * @return \Illuminate\Http\Response
     */
    public function edit(Threshold $threshold)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\ThresholdUpdate  $request
     * @param  \App\Models\Threshold  $threshold
     * @return \Illuminate\Http\Response
     */
    public function update(ThresholdUpdate $request, Threshold $threshold)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Threshold  $threshold
     * @return \Illuminate\Http\Response
     */
    public function destroy(Threshold $threshold)
    {
        //
    }
}
