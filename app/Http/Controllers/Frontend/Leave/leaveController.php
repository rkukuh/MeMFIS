<?php

namespace App\Http\Controllers\Frontend\Leave;

use App\Models\Leave;
use App\Models\Status;
use App\Models\Approval;
use App\Models\Employee;
use App\Models\LeaveType;

use Auth;
use Illuminate\Http\Request;
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
        $status = Status::ofLeave()->where('code','open')->first();

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
    public function show(Leave $leave)
    {
        return view('frontend.propose-leave.propose-leave.show',[
            'leave' => $leave,
            'employee' => $leave->employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        $types = LeaveType::get();

        return view('frontend.propose-leave.propose-leave.edit',[
            'leave' => $leave,
            'types' => $types,
            'employee' => $leave->employee,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\leaveUpdate  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(leaveUpdate $request, Leave $leave)
    {
        $leave->update([$request->all()]);

        return response()->json($leave);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }

    /**
     * Give approval the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function approve(Leave $leave, Request $request)
    {
        $status = Status::ofLeave()->where('code', 'approved')->first();
        
        $leave->approvals()->save(new Approval([
            'is_approved' => 1,
            'note' => $request->note,
            'conducted_by' => Auth::id(),
            'approvable_id' => $leave->id,
        ]));

        $result = $leave->update([
            'status_id' => $status->id
        ]);

        return response()->json($result);
    }

    /**
     * Give rejection the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reject(Leave $leave, Request $request)
    {
        $status = Status::ofLeave()->where('code', 'rejected')->first();

        $leave->approvals()->save(new Approval([
            'is_approved' => 0,
            'note' => $request->note,
            'conducted_by' => Auth::id(),
            'approvable_id' => $leave->id,
        ]));

        $result = $leave->update([
            'status_id' => $status->id
        ]);
        
        return response()->json($result);
    }

    /**
     * API for ajax request for leave data and informations.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function leaveModal(Leave $leave)
    {
        $leave->leave_type = $leave->leaveType;
        $leave->status = $leave->status;
        $leave->approval = $leave->approvals->last();
        $leave->conductedBy = $leave->approvals->last()->conductedBy;
        return response()->json($leave);
    }
}
