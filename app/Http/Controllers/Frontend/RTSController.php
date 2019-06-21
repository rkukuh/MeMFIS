<?php

namespace App\Http\Controllers\Frontend;

use App\Models\RTS;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RTSStore;
use App\Http\Requests\Frontend\RTSUpdate;

class RTSController extends Controller
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
     * @param  \App\Http\Requests\Frontend\RTSStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RTSStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RTS  $rTS
     * @return \Illuminate\Http\Response
     */
    public function show(RTS $rTS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RTS  $rTS
     * @return \Illuminate\Http\Response
     */
    public function edit(RTS $rTS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\RTSUpdate  $request
     * @param  \App\Models\RTS  $rTS
     * @return \Illuminate\Http\Response
     */
    public function update(RTSUpdate $request, RTS $rTS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RTS  $rTS
     * @return \Illuminate\Http\Response
     */
    public function destroy(RTS $rTS)
    {
        //
    }
}
