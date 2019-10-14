<?php

namespace App\Http\Controllers\Frontend;

use App\Models\JobTittle;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobTittleStore;
use App\Http\Requests\Frontend\JobTittleUpdate;

class JobTittleController extends Controller
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
     * @param  \App\Http\Requests\Frontend\JobTittleStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobTittleStore $request)
    {
        $jobtittle = JobTittle::create($request->all());

        // TODO: Return error message as JSON
        return response()->json($jobtittle);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobTittle  $jobTittle
     * @return \Illuminate\Http\Response
     */
    public function show(JobTittle $jobTittle)
    {
        // TODO: Return error message as JSON
        return response()->json($jobTittle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobTittle  $jobTittle
     * @return \Illuminate\Http\Response
     */
    public function edit(JobTittle $jobTittle)
    {
        // TODO: Return error message as JSON
        return response()->json($jobTittle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\JobTittleUpdate  $request
     * @param  \App\Models\JobTittle  $jobTittle
     * @return \Illuminate\Http\Response
     */
    public function update(JobTittleUpdate $request, JobTittle $jobTittle)
    {
        $jobTittle->update($request->all());

        // TODO: Return error message as JSON
        return response()->json($jobTittle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobTittle  $jobTittle
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobTittle $jobTittle)
    {
        $jobTittle->delete();

        // TODO: Return error message as JSON
        return response()->json($jobTittle);
    }
}
