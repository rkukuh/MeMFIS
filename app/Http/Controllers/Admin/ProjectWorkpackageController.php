<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProjectWorkpackage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectWorkpackageStore;
use App\Http\Requests\Admin\ProjectWorkpackageUpdate;

class ProjectWorkpackageController extends Controller
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
     * @param  \App\Http\Requests\Admin\ProjectWorkpackageStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectWorkpackageStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectWorkpackage  $projectWorkpackage
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectWorkpackage $projectWorkpackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectWorkpackage  $projectWorkpackage
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectWorkpackage $projectWorkpackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\ProjectWorkpackageUpdate  $request
     * @param  \App\Models\ProjectWorkpackage  $projectWorkpackage
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectWorkpackageUpdate $request, ProjectWorkpackage $projectWorkpackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectWorkpackage  $projectWorkpackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectWorkpackage $projectWorkpackage)
    {
        //
    }
}
