<?php

namespace App\Http\Controllers\Admin;

use App\Models\Interchange;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InterchangeStore;
use App\Http\Requests\Admin\InterchangeUpdate;

class InterchangeController extends Controller
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
     * @param  \App\Http\Requests\Admin\InterchangeStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InterchangeStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interchange  $interchange
     * @return \Illuminate\Http\Response
     */
    public function show(Interchange $interchange)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interchange  $interchange
     * @return \Illuminate\Http\Response
     */
    public function edit(Interchange $interchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\InterchangeUpdate  $request
     * @param  \App\Models\Interchange  $interchange
     * @return \Illuminate\Http\Response
     */
    public function update(InterchangeUpdate $request, Interchange $interchange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interchange  $interchange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interchange $interchange)
    {
        //
    }
}
