<?php

namespace App\Http\Controllers\Admin;

use App\Models\BPJS;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BPJSStore;
use App\Http\Requests\Admin\BPJSUpdate;

class BPJSController extends Controller
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
     * @param  \App\Http\Requests\Admin\BPJSStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BPJSStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BPJS  $bPJS
     * @return \Illuminate\Http\Response
     */
    public function show(BPJS $bPJS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BPJS  $bPJS
     * @return \Illuminate\Http\Response
     */
    public function edit(BPJS $bPJS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\BPJSUpdate  $request
     * @param  \App\Models\BPJS  $bPJS
     * @return \Illuminate\Http\Response
     */
    public function update(BPJSUpdate $request, BPJS $bPJS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BPJS  $bPJS
     * @return \Illuminate\Http\Response
     */
    public function destroy(BPJS $bPJS)
    {
        //
    }
}
