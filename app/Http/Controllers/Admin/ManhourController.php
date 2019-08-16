<?php

namespace App\Http\Controllers\Admin;

use App\Models\Manhour;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManhourStore;
use App\Http\Requests\Admin\ManhourUpdate;

class ManhourController extends Controller
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
     * @param  \App\Http\Requests\Admin\ManhourStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManhourStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manhour  $manhour
     * @return \Illuminate\Http\Response
     */
    public function show(Manhour $manhour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manhour  $manhour
     * @return \Illuminate\Http\Response
     */
    public function edit(Manhour $manhour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\ManhourUpdate  $request
     * @param  \App\Models\Manhour  $manhour
     * @return \Illuminate\Http\Response
     */
    public function update(ManhourUpdate $request, Manhour $manhour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manhour  $manhour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manhour $manhour)
    {
        //
    }
}
