<?php

namespace App\Http\Controllers\Admin;

use App\Models\AttendanceCorrection;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AttendanceCorrectionStore;
use App\Http\Requests\Admin\AttendanceCorrectionUpdate;

class AttendanceCorrectionController extends Controller
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
     * @param  \App\Http\Requests\Admin\AttendanceCorrectionStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttendanceCorrectionStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttendanceCorrection  $attendanceCorrection
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceCorrection $attendanceCorrection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttendanceCorrection  $attendanceCorrection
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendanceCorrection $attendanceCorrection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\AttendanceCorrectionUpdate  $request
     * @param  \App\Models\AttendanceCorrection  $attendanceCorrection
     * @return \Illuminate\Http\Response
     */
    public function update(AttendanceCorrectionUpdate $request, AttendanceCorrection $attendanceCorrection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttendanceCorrection  $attendanceCorrection
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceCorrection $attendanceCorrection)
    {
        //
    }
}
