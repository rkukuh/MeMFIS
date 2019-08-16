<?php

namespace App\Http\Controllers\Admin;

use App\Models\JobTittle;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JobTittleStore;
use App\Http\Requests\Admin\JobTittleUpdate;

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
     * @param  \App\Http\Requests\Admin\JobTittleStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobTittleStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobTittle  $jobTittle
     * @return \Illuminate\Http\Response
     */
    public function show(JobTittle $jobTittle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobTittle  $jobTittle
     * @return \Illuminate\Http\Response
     */
    public function edit(JobTittle $jobTittle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\JobTittleUpdate  $request
     * @param  \App\Models\JobTittle  $jobTittle
     * @return \Illuminate\Http\Response
     */
    public function update(JobTittleUpdate $request, JobTittle $jobTittle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobTittle  $jobTittle
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobTittle $jobTittle)
    {
        //
    }
}
