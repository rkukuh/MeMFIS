<?php

namespace App\Http\Controllers\Admin;

use App\Models\leave;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\leaveStore;
use App\Http\Requests\Admin\leaveUpdate;

class leaveController extends Controller
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
     * @param  \App\Http\Requests\Admin\leaveStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(leaveStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\leaveUpdate  $request
     * @param  \App\Models\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(leaveUpdate $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
