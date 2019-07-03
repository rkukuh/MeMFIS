<?php

namespace App\Http\Controllers\Admin;

use App\Models\TaskCardWorkPackage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TaskCardWorkPackageStore;
use App\Http\Requests\Admin\TaskCardWorkPackageUpdate;

class TaskCardWorkPackageController extends Controller
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
     * @param  \App\Http\Requests\Admin\TaskCardWorkPackageStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCardWorkPackageStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskCardWorkPackage  $taskCardWorkPackage
     * @return \Illuminate\Http\Response
     */
    public function show(TaskCardWorkPackage $taskCardWorkPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskCardWorkPackage  $taskCardWorkPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskCardWorkPackage $taskCardWorkPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\TaskCardWorkPackageUpdate  $request
     * @param  \App\Models\TaskCardWorkPackage  $taskCardWorkPackage
     * @return \Illuminate\Http\Response
     */
    public function update(TaskCardWorkPackageUpdate $request, TaskCardWorkPackage $taskCardWorkPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskCardWorkPackage  $taskCardWorkPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskCardWorkPackage $taskCardWorkPackage)
    {
        //
    }
}
