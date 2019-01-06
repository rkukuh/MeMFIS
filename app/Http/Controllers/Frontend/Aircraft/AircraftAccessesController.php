<?php

namespace App\Http\Controllers\Frontend\Aircraft;

use App\Models\Access;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AircraftAccessStore;
use App\Http\Requests\Frontend\AircraftAccessUpdate;

class AircraftAccessesController extends Controller
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
     * @param  \App\Http\Requests\Frontend\AircraftAccessStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AircraftAccessStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function show(Access $access)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function edit(Access $access)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\AircraftAccessUpdate  $request
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function update(AircraftAccessUpdate $request, Access $access)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function destroy(Access $access)
    {
        //
    }
}
