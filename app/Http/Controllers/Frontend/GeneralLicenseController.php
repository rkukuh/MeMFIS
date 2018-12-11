<?php

namespace App\Http\Controllers\Frontend;

use App\Models\GeneralLicense;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\GeneralLicenseStore;
use App\Http\Requests\Frontend\GeneralLicenseUpdate;

class GeneralLicenseController extends Controller
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
     * @param  \App\Http\Requests\Frontend\GeneralLicenseStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GeneralLicenseStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GeneralLicense  $generalLicense
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralLicense $generalLicense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GeneralLicense  $generalLicense
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralLicense $generalLicense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\GeneralLicenseUpdate  $request
     * @param  \App\Models\GeneralLicense  $generalLicense
     * @return \Illuminate\Http\Response
     */
    public function update(GeneralLicenseUpdate $request, GeneralLicense $generalLicense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GeneralLicense  $generalLicense
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralLicense $generalLicense)
    {
        //
    }
}
