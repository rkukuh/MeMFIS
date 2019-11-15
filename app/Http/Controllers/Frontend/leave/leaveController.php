<?php

namespace App\Http\Controllers\Frontend\leave;

use App\Models\Leave;
use App\Models\Status;
use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\EmployeeAttendance;

use App\Helpers\DocumentNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\leaveStore;
use App\Http\Requests\Frontend\leaveUpdate;

class leaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.propose-leave.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.propose-leave.propose-leave.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\leaveStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(leaveStore $request)
    {
        $leave_type = LeaveType::where('uuid', $request->leave_type)->first();
        $employee = Employee::where('uuid', $request->uuid_employee)->first();
        $code = DocumentNumber::generate('LEAV-', Leave::withTrashed()->count()+1);
        $status = Status::ofAttendanceCorrection()->where('code','open')->first();

        $leave = Leave::create([
            'code' => $code,
            'start_date' => $request->date_start,
            'end_date' => $request->date_end,
            'employee_id' => $employee->id,
            'status_id' => $status->id,
            'leavetype_id' => $leave_type->id,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => "Leave has been saved.",
            'title' => "Success ".$leave->code,
            'alert-type' => "success"
        );

        return redirect()->route('frontend.leave.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(leave $leave)
    {
        return view('frontend.propose-leave.propose-leave.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\leaveUpdate  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(leaveUpdate $request, leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(leave $leave)
    {
        //
    }
}
