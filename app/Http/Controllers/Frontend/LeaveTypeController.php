<?php

namespace App\Http\Controllers\Frontend;

use App\Models\LeaveType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\LeaveTypeStore;
use App\Http\Requests\Frontend\LeaveTypeUpdate;

class LeaveTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.leave-types.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.leave-types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\LeaveTypeStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeaveTypeStore $request)
    {
        $leaveType = LeaveType::create($request->all());

        // TODO: Return error message as JSON
        return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveType $leaveType)
    {
        return view('frontend.leave-types.show',['leaveType' => $leaveType]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveType $leaveType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\LeaveTypeUpdate  $request
     * @param  \App\Models\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function update(LeaveTypeUpdate $request, LeaveType $leaveType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LeaveType  $leaveType
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveType $leaveType)
    {
        //
    }
}
