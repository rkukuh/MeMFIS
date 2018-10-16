<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Pivots\AmeLicense;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AmeLicenseStore;
use App\Http\Requests\Frontend\AmeLicenseUpdate;

class AmeLicenseController extends Controller
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
     * @param  \App\Http\Requests\Frontend\AmeLicenseStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmeLicenseStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pivots\AmeLicense  $ameLicense
     * @return \Illuminate\Http\Response
     */
    public function show(AmeLicense $ameLicense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pivots\AmeLicense  $ameLicense
     * @return \Illuminate\Http\Response
     */
    public function edit(AmeLicense $ameLicense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\AmeLicenseUpdate  $request
     * @param  \App\Models\Pivots\AmeLicense  $ameLicense
     * @return \Illuminate\Http\Response
     */
    public function update(AmeLicenseUpdate $request, AmeLicense $ameLicense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pivots\AmeLicense  $ameLicense
     * @return \Illuminate\Http\Response
     */
    public function destroy(AmeLicense $ameLicense)
    {
        //
    }
}
