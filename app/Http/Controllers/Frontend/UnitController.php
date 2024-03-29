<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Unit;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\UnitStore;
use App\Http\Requests\Frontend\UnitUpdate;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.unit.index');
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
     * @param  \App\Http\Requests\Frontend\UnitStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitStore $request)
    {
        $unit = Unit::create($request->all());

        return response()->json($unit);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return response()->json($unit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\UnitUpdate  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(UnitUpdate $request, Unit $unit)
    {
        $unit->update($request->all());

        return response()->json($unit);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return response()->json($unit);
    }
}
