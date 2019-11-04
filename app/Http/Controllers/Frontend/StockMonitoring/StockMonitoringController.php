<?php

namespace App\Http\Controllers\Frontend\StockMonitoring;

use App\Models\FefoIn;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockMonitoringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.stock-monitoring.index');
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
     * @param  \App\Models\FefoIn  $fefoIn
     * @return \Illuminate\Http\Response
     */
    public function show(FefoIn $fefoIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FefoIn  $fefoIn
     * @return \Illuminate\Http\Response
     */
    public function edit(FefoIn $fefoIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FefoIn  $fefoIn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FefoIn $fefoIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FefoIn  $fefoIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(FefoIn $fefoIn)
    {
        //
    }
}
