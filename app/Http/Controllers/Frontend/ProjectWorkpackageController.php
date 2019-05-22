<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ProjectWorkPackage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProjectWorkPackageStore;
use App\Http\Requests\Frontend\ProjectWorkPackageUpdate;

class ProjectWorkPackageController extends Controller
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
     * @param  \App\Http\Requests\Frontend\ProjectWorkPackageStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectWorkPackageStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectWorkPackage  $projectWorkPackage
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectWorkPackage $projectWorkPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectWorkPackage  $projectWorkPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectWorkPackage $projectWorkPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ProjectWorkPackageUpdate  $request
     * @param  \App\Models\ProjectWorkPackage  $projectWorkPackage
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectWorkPackageUpdate $request, ProjectWorkPackage $projectWorkPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectWorkPackage  $projectWorkPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectWorkPackage $projectWorkPackage)
    {
        //
    }
}
