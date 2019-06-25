<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ProjectWorkPackageFacility;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ProjectWorkPackageFacilityStore;
use App\Http\Requests\Frontend\ProjectWorkPackageFacilityUpdate;

class ProjectWorkPackageFacilityController extends Controller
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
     * @param  \App\Http\Requests\Frontend\ProjectWorkPackageFacilityStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectWorkPackageFacilityStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectWorkPackageFacility  $projectWorkPackageFacility
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectWorkPackageFacility $projectWorkPackageFacility)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectWorkPackageFacility  $projectWorkPackageFacility
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectWorkPackageFacility $projectWorkPackageFacility)
    {
        dd($projectWorkPackageFacility);
        return response()->json($projectWorkPackageFacility);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ProjectWorkPackageFacilityUpdate  $request
     * @param  \App\Models\ProjectWorkPackageFacility  $projectWorkPackageFacility
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectWorkPackageFacilityUpdate $request, ProjectWorkPackageFacility $projectWorkPackageFacility)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectWorkPackageFacility  $projectWorkPackageFacility
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectWorkPackageFacility $projectWorkPackageFacility)
    {
        //
    }
}
