<?php

namespace App\Http\Controllers\Admin;

use App\Models\AircraftZone;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AircraftZoneStore;
use App\Http\Requests\Admin\AircraftZoneUpdate;

class AircraftZoneController extends Controller
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
     * @param  \App\Http\Requests\Admin\AircraftZoneStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AircraftZoneStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AircraftZone  $aircraftZone
     * @return \Illuminate\Http\Response
     */
    public function show(AircraftZone $aircraftZone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AircraftZone  $aircraftZone
     * @return \Illuminate\Http\Response
     */
    public function edit(AircraftZone $aircraftZone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\AircraftZoneUpdate  $request
     * @param  \App\Models\AircraftZone  $aircraftZone
     * @return \Illuminate\Http\Response
     */
    public function update(AircraftZoneUpdate $request, AircraftZone $aircraftZone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AircraftZone  $aircraftZone
     * @return \Illuminate\Http\Response
     */
    public function destroy(AircraftZone $aircraftZone)
    {
        //
    }
}
