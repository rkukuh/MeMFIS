<?php

namespace App\Http\Controllers\Admin;

use App\Models\Fax;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FaxStore;
use App\Http\Requests\Admin\FaxUpdate;

class FaxController extends Controller
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
     * @param  \App\Http\Requests\Admin\FaxStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaxStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fax  $fax
     * @return \Illuminate\Http\Response
     */
    public function show(Fax $fax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fax  $fax
     * @return \Illuminate\Http\Response
     */
    public function edit(Fax $fax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\FaxUpdate  $request
     * @param  \App\Models\Fax  $fax
     * @return \Illuminate\Http\Response
     */
    public function update(FaxUpdate $request, Fax $fax)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fax  $fax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fax $fax)
    {
        //
    }
}
