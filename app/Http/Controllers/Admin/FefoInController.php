<?php

namespace App\Http\Controllers\Admin;

use App\Models\FefoIn;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FefoInStore;
use App\Http\Requests\Admin\FefoInUpdate;

class FefoInController extends Controller
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
     * @param  \App\Http\Requests\Admin\FefoInStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FefoInStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FefoIn  $fefoIn
     * @return \Illuminate\Http\Response
     */
    public function show(FefoIn $fefoIn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FefoIn  $fefoIn
     * @return \Illuminate\Http\Response
     */
    public function edit(FefoIn $fefoIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\FefoInUpdate  $request
     * @param  \App\Models\FefoIn  $fefoIn
     * @return \Illuminate\Http\Response
     */
    public function update(FefoInUpdate $request, FefoIn $fefoIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FefoIn  $fefoIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(FefoIn $fefoIn)
    {
        //
    }
}
