<?php

namespace App\Http\Controllers\Admin;

use App\Models\OTRCertification;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OTRCertificationStore;
use App\Http\Requests\Admin\OTRCertificationUpdate;

class OTRCertificationController extends Controller
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
     * @param  \App\Http\Requests\Admin\OTRCertificationStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OTRCertificationStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OTRCertification  $otrCertification
     * @return \Illuminate\Http\Response
     */
    public function show(OTRCertification $otrCertification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OTRCertification  $otrCertification
     * @return \Illuminate\Http\Response
     */
    public function edit(OTRCertification $otrCertification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\OTRCertificationUpdate  $request
     * @param  \App\Models\OTRCertification  $otrCertification
     * @return \Illuminate\Http\Response
     */
    public function update(OTRCertificationUpdate $request, OTRCertification $otrCertification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OTRCertification  $otrCertification
     * @return \Illuminate\Http\Response
     */
    public function destroy(OTRCertification $otrCertification)
    {
        //
    }
}
