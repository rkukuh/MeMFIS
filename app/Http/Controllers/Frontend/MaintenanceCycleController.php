<?php

namespace App\Http\Controllers\Frontend;

use App\Models\MaintenanceCycle;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\MaintenanceCycleStore;
use App\Http\Requests\Frontend\MaintenanceCycleUpdate;

class MaintenanceCycleController extends Controller
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
     * @param  \App\Http\Requests\Frontend\MaintenanceCycleStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MaintenanceCycleStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MaintenanceCycle  $maintenanceCycle
     * @return \Illuminate\Http\Response
     */
    public function show(MaintenanceCycle $maintenanceCycle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MaintenanceCycle  $maintenanceCycle
     * @return \Illuminate\Http\Response
     */
    public function edit(MaintenanceCycle $maintenanceCycle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\MaintenanceCycleUpdate  $request
     * @param  \App\Models\MaintenanceCycle  $maintenanceCycle
     * @return \Illuminate\Http\Response
     */
    public function update(MaintenanceCycleUpdate $request, MaintenanceCycle $maintenanceCycle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MaintenanceCycle  $maintenanceCycle
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaintenanceCycle $maintenanceCycle)
    {
        //
    }
}
