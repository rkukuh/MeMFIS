<?php

namespace App\Http\Controllers\Frontend;

use App\Models\JobTitle;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JobTitleStore;
use App\Http\Requests\Frontend\JobTitleUpdate;

class JobTitleController extends Controller
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
     * @param  \App\Http\Requests\Frontend\JobTitleStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobTitleStore $request)
    {
        $jobtitle = JobTitle::create($request->all());

        // TODO: Return error message as JSON
        return response()->json($jobtitle);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function show(JobTitle $jobTitle)
    {
        // TODO: Return error message as JSON
        return response()->json($jobTitle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function edit(JobTitle $jobTitle)
    {
        // TODO: Return error message as JSON
        return response()->json($jobTitle);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\JobTitleUpdate  $request
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function update(JobTitleUpdate $request, JobTitle $jobTitle)
    {
        $jobTitle->update($request->all());

        // TODO: Return error message as JSON
        return response()->json($jobTitle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobTitle  $jobTitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobTitle $jobTitle)
    {
        $jobTitle->delete();

        // TODO: Return error message as JSON
        return response()->json($jobTitle);
    }
}
