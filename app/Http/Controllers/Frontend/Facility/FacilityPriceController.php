<?php

namespace App\Http\Controllers\Frontend\Facility;

use Illuminate\Http\Request;
use App\Models\Price;
use App\Models\Facility;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PriceStore;
use App\Http\Requests\Frontend\PriceUpdate;

class FacilityPriceController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function store(PriceStore $request, Facility $facility)
    {
        for ($i=0; $i < sizeof($request->price); $i++) {
            $facility->prices()
            ->save(new Price (['amount' =>$request->price[$i],'level' =>$request->level[$i]]));
        }
        return response()->json($facility);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function show(Facility $facility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function edit(Facility $facility)
    {
        return response()->json($facility->prices);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Facility $facility)
    {
        foreach($request->uuid as $key => $uuid){
            $price = Price::where('uuid', $uuid)->update(['amount' => $request->price[$key], 'level' => $request->level[$key]]);
        }

        return response()->json($facility->prices);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Facility  $facility
     * @return \Illuminate\Http\Response
     */
    public function destroy(Facility $facility)
    {
        //
    }
}
