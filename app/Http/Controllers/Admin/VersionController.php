<?php

namespace App\Http\Controllers\Admin;

use App\Models\Version;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\VersionStore;
use App\Http\Requests\Admin\VersionUpdate;

class VersionController extends Controller
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
     * @param  \App\Http\Requests\Admin\VersionStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VersionStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Version  $version
     * @return \Illuminate\Http\Response
     */
    public function show(Version $version)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Version  $version
     * @return \Illuminate\Http\Response
     */
    public function edit(Version $version)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\VersionUpdate  $request
     * @param  \App\Models\Version  $version
     * @return \Illuminate\Http\Response
     */
    public function update(VersionUpdate $request, Version $version)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Version  $version
     * @return \Illuminate\Http\Response
     */
    public function destroy(Version $version)
    {
        //
    }
}
