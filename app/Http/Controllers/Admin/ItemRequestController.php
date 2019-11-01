<?php

namespace App\Http\Controllers\Admin;

use App\Models\ItemRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ItemRequestStore;
use App\Http\Requests\Admin\ItemRequestUpdate;

class ItemRequestController extends Controller
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
     * @param  \App\Http\Requests\Admin\ItemRequestStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequestStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function show(ItemRequest $itemRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemRequest $itemRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\ItemRequestUpdate  $request
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequestUpdate $request, ItemRequest $itemRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemRequest $itemRequest)
    {
        //
    }
}
