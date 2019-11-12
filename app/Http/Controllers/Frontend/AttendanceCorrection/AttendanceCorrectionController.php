<?php

namespace App\Http\Controllers\Frontend\AttendanceCorrection;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AttendanceCorrectionStore;
use App\Http\Requests\Frontend\AttendanceCorrectionUpdate;

use App\Models\Type;
use App\Models\Employee;
use App\Models\AttendanceCorrection;


class AttendanceCorrectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.attendance-correction.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.attendance-correction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\AttendanceCorrectionStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttendanceCorrectionStore $request)
    {
        $employee = Employee::where("uuid", $request->uuid_employee)->first();
        $correction_type = Type::ofAttendanceCorrection()->where("code", $request->attendance_correction_time_type)->first();
    
        $AttendanceCorrection = AttendanceCorrection::create([
            'correction_time' => $request->time_correction, 
            'correction_date' => $request->date, 
            'employee_id' => $employee->id, 
            'type_id' => $correction_type->id,
            'status_id' => 1,// to do , set to valid value
        ]);

        return redirect()->route('frontend.attendance-correction.index')->with('success', 'Attendance Correction has been created.');
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
        return view('frontend.attendance-correction.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\AttendanceCorrectionUpdate  $request
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


    /**
     * Attendance correction approval
     */
    public function approval(){

    }
}