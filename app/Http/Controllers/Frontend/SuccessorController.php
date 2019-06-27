<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Successor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\SuccessorStore;
use App\Http\Requests\Frontend\SuccessorUpdate;

class SuccessorController extends Controller
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
     * @param  \App\Http\Requests\Frontend\SuccessorStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SuccessorStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Successor  $successor
     * @return \Illuminate\Http\Response
     */
    public function show(Successor $successor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Successor  $successor
     * @return \Illuminate\Http\Response
     */
    public function edit(Successor $successor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\SuccessorUpdate  $request
     * @param  \App\Models\Successor  $successor
     * @return \Illuminate\Http\Response
     */
    public function update(SuccessorUpdate $request, Successor $successor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Successor  $successor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Successor $successor)
    {
        //
    }
}
