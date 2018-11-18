<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Description;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\DescriptionStore;
use App\Http\Requests\Frontend\DescriptionUpdate;

class DescriptionController extends Controller
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
     * @param  \App\Http\Requests\Frontend\DescriptionStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DescriptionStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Description  $description
     * @return \Illuminate\Http\Response
     */
    public function show(Description $description)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Description  $description
     * @return \Illuminate\Http\Response
     */
    public function edit(Description $description)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\DescriptionUpdate  $request
     * @param  \App\Models\Description  $description
     * @return \Illuminate\Http\Response
     */
    public function update(DescriptionUpdate $request, Description $description)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Description  $description
     * @return \Illuminate\Http\Response
     */
    public function destroy(Description $description)
    {
        //
    }
}
