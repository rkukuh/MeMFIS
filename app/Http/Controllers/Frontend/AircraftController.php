<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Aircraft;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AircraftStore;
use App\Http\Requests\Frontend\AircraftUpdate;

class AircraftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.aircraft.index');
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
     * @param  \App\Http\Requests\Frontend\AircraftStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AircraftStore $request)
    {
        $aircraft = Aircraft::create($request->all());

        return response()->json($aircraft);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function show(Aircraft $aircraft)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function edit(Aircraft $aircraft)
    {
        return response()->json($aircraft);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\AircraftUpdate  $request
     * @param  \App\Models\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function update(AircraftUpdate $request, Aircraft $aircraft)
    {
        $aircraft->update($request->all());

        return response()->json($aircraft);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aircraft  $aircraft
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aircraft $aircraft)
    {
        $aircraft->delete();

        return response()->json($aircraft);
    }
}
