<?php

namespace App\Http\Controllers\Frontend\Item;

use App\Models\Item;
use App\Models\Price;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PriceStore;
use App\Http\Requests\Frontend\PriceUpdate;

class ItemPriceController extends Controller
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
     * @param  \App\Http\Requests\Frontend\PriceStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PriceStore $request, Item $item)
    {   
        for ($i=0; $i < sizeof($request->price); $i++) {
            $item->prices()->save(new Price (['amount' =>$request->price[$i],'level' =>$request->level[$i]]));
           
        }
        return response()->json($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return response()->json($item->prices);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\PriceUpdate  $request
     * @param  \App\Models\Item  $Item
     * @return \Illuminate\Http\Response
     */
    public function update(PriceUpdate $request, Facility $item)
    {
        foreach($request->uuid as $key => $uuid){
            Price::where('uuid', $uuid)->update(['amount' => $request->price[$key], 'level' => $request->level[$key]]);
        }

        return response()->json($item->prices);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        //
    }
}
