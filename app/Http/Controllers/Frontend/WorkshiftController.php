<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Workshift;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\WorkshiftStore;
use App\Http\Requests\Frontend\WorkshiftUpdate;

class WorkshiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.workshift-schedule.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.workshift-schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkshiftStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkshiftStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workshift  $workshift
     * @return \Illuminate\Http\Response
     */
    public function show(Workshift $workshift)
    {
        return view('frontend.workshift-schedule.show',['workshift' => $workshift]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workshift  $workshift
     * @return \Illuminate\Http\Response
     */
    public function edit(Workshift $workshift)
    {
        return view('frontend.workshift-schedule.edit',['workshift' => $workshift]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkshiftUpdate  $request
     * @param  \App\Models\Workshift  $workshift
     * @return \Illuminate\Http\Response
     */
    public function update(WorkshiftUpdate $request, Workshift $workshift)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workshift  $workshift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workshift $workshift)
    {
        //
    }
}
