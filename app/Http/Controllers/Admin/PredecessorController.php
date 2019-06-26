<?php

namespace App\Http\Controllers\Admin;

use App\Models\Predecessor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PredecessorStore;
use App\Http\Requests\Admin\PredecessorUpdate;

class PredecessorController extends Controller
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
     * @param  \App\Http\Requests\Admin\PredecessorStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PredecessorStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Predecessor  $predecessor
     * @return \Illuminate\Http\Response
     */
    public function show(Predecessor $predecessor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Predecessor  $predecessor
     * @return \Illuminate\Http\Response
     */
    public function edit(Predecessor $predecessor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\PredecessorUpdate  $request
     * @param  \App\Models\Predecessor  $predecessor
     * @return \Illuminate\Http\Response
     */
    public function update(PredecessorUpdate $request, Predecessor $predecessor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Predecessor  $predecessor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Predecessor $predecessor)
    {
        //
    }
}
