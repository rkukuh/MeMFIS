<?php

namespace App\Http\Controllers\Frontend;

use App\Models\LeavePeriod;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\LeavePeriodStore;
use App\Http\Requests\Frontend\LeavePeriodUpdate;

class LeavePeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.leave-period.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.leave-period.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\LeavePeriodStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeavePeriodStore $request)
    {
        $leavePeriod = LeavePeriod::create($request->all());

        // TODO: Return error message as JSON
        return response()->json($leavePeriod);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeavePeriod  $leavePeriod
     * @return \Illuminate\Http\Response
     */
    public function show(LeavePeriod $leavePeriod)
    {
        return view('frontend.leave-period.show',['leaveperiod' => $leavePeriod]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeavePeriod  $leavePeriod
     * @return \Illuminate\Http\Response
     */
    public function edit(LeavePeriod $leavePeriod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\LeavePeriodUpdate  $request
     * @param  \App\Models\LeavePeriod  $leavePeriod
     * @return \Illuminate\Http\Response
     */
    public function update(LeavePeriodUpdate $request, LeavePeriod $leavePeriod)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeavePeriod  $leavePeriod
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeavePeriod $leavePeriod)
    {
        //
    }
}
