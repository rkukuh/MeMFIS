<?php

namespace App\Http\Controllers\Frontend\InventoryOut;

use App\Models\InventoryOut;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\InventoryOutStore;
use App\Http\Requests\Frontend\InventoryOutUpdate;

class MaterialInventoryOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.inventory-out.material.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.inventory-out.material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\InventoryOutStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryOutStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryOut $inventoryOut)
    {
        return view('frontend.inventory-out.material.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryOut $inventoryOut)
    {
        return view('frontend.inventory-out.material.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\InventoryOutUpdate  $request
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryOutUpdate $request, InventoryOut $inventoryOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryOut $inventoryOut)
    {
        //
    }
}
