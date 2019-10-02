<?php

namespace App\Http\Controllers\Admin;

use App\Models\FefoOut;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FefoOutStore;
use App\Http\Requests\Admin\FefoOutUpdate;

class FefoOutController extends Controller
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
     * @param  \App\Http\Requests\Admin\FefoOutStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FefoOutStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FefoOut  $fefoOut
     * @return \Illuminate\Http\Response
     */
    public function show(FefoOut $fefoOut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FefoOut  $fefoOut
     * @return \Illuminate\Http\Response
     */
    public function edit(FefoOut $fefoOut)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\FefoOutUpdate  $request
     * @param  \App\Models\FefoOut  $fefoOut
     * @return \Illuminate\Http\Response
     */
    public function update(FefoOutUpdate $request, FefoOut $fefoOut)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FefoOut  $fefoOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(FefoOut $fefoOut)
    {
        //
    }
}
