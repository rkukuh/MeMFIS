<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Manufacturer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ManufacturerStore;
use App\Http\Requests\Frontend\ManufacturerUpdate;

class ManufacturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.manufacturer.index');
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
     * @param  \App\Http\Requests\Frontend\ManufacturerStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManufacturerStore $request)
    {
        $manufacturer = Manufacturer::create($request->all());

        return response()->json($manufacturer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacturer $manufacturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacturer $manufacturer)
    {
        return response()->json($manufacturer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ManufacturerUpdate  $request
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function update(ManufacturerUpdate $request, Manufacturer $manufacturer)
    {
        $manufacturer->update($request->all());

        return response()->json($manufacturer);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manufacturer  $manufacturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacturer $manufacturer)
    {
        $manufacturer->delete();

        return response()->json($manufacturer);
    }
}
