<?php

namespace App\Http\Controllers\Admin;

use App\Models\InventoryIn;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InventoryInStore;
use App\Http\Requests\Admin\InventoryInUpdate;

class InventoryInController extends Controller
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
     * @param  \App\Http\Requests\Admin\InventoryInStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryInStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryIn $inventoryIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryIn $inventoryIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\InventoryInUpdate  $request
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryInUpdate $request, InventoryIn $inventoryIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryIn  $inventoryIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryIn $inventoryIn)
    {
        //
    }
}
