<?php

namespace App\Http\Controllers\Admin;

use App\Models\InventoryOut;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InventoryOutStore;
use App\Http\Requests\Admin\InventoryOutUpdate;

class InventoryOutController extends Controller
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
     * @param  \App\Http\Requests\Admin\InventoryOutStore  $request
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryOut $inventoryOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\InventoryOutUpdate  $request
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
