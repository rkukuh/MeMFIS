<?php

namespace App\Http\Controllers\Frontend\AttendanceCorrection;

use DB;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\DocumentNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\AttendanceCorrectionStore;
use App\Http\Requests\Frontend\AttendanceCorrectionUpdate;

use App\Models\Type;
use App\Models\Status;
use App\Models\Approval;
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
        $code = DocumentNumber::generate('ATCO-', AttendanceCorrection::withTrashed()->count()+1);
        $status = Status::ofAttendanceCorrection()->where("code","open")->first();

        $AttendanceCorrection = AttendanceCorrection::create([
            'code' => $code,
            'status_id' => $status->id,
            'employee_id' => $employee->id, 
            'type_id' => $correction_type->id,
            'correction_date' => $request->date, 
            'description' => $request->description,
            'correction_time' => $request->time_correction, 
        ]);

        $notification = array(
            'message' => "Attendance correction has been saved.",
            'title' => "Success",
            'alert-type' => "success"
        );

        return redirect()->route('frontend.attendance-correction.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttendanceCorrection  $attcor
     * @return \Illuminate\Http\Response
     */
    public function show(AttendanceCorrection $attcor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttendanceCorrection  $attcor
     * @return \Illuminate\Http\Response
     */
    public function edit(AttendanceCorrection $attcor)
    {
        return view('frontend.attendance-correction.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\AttendanceCorrectionUpdate  $request
     * @param  \App\Models\AttendanceCorrection  $attcor
     * @return \Illuminate\Http\Response
     */
    public function update(AttendanceCorrectionUpdate $request, AttendanceCorrection $attcor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttendanceCorrection  $attcor
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttendanceCorrection $attcor)
    {
        //
    }


    /**
     * Attendance correction approval
     * 
     * @param  \App\Models\AttendanceCorrection  $attcor
     * @return \Illuminate\Http\Response
     */
    public function approval(AttendanceCorrection $attcor, Request $request){
        $type = $attcor->type;
        $replica = DB::table('employee_attendances')->where('employee_id', $attcor->employee_id)->where('date', $attcor->correction_date)->whereNull('deleted_at')->first();
        $updated = DB::table('employee_attendances')->where('uuid', $replica->uuid)->update(['deleted_at' => Carbon::now()]);
        if($type->code == "check-in"){
                $inserted = DB::table('employee_attendances')->insert([
                        'uuid' => Str::uuid(),
                        'employee_id' => $replica->employee_id, 
                        'date' => $replica->date,
                        'in' => $attcor->correction_time, 
                        'out' => $replica->out,
                        'late_in' => $replica->late_in, 
                        'earlier_out' => $replica->earlier_out,
                        'overtime' => $replica->overtime, 
                        'statuses_id' => $replica->statuses_id,
                        'created_at' => $replica->created_at,
                        'updated_at' => $replica->updated_at, 
                        'deleted_at' => null,
                    ]);
            }else{
                $inserted = DB::table('employee_attendances')->insert([
                    'uuid' => Str::uuid(),
                    'employee_id' => $replica->employee_id, 
                    'date' => $replica->date,
                    'in' => $replica->in, 
                    'out' => $attcor->correction_time,
                    'late_in' => $replica->late_in, 
                    'earlier_out' => $replica->earlier_out,
                    'overtime' => $replica->overtime, 
                    'statuses_id' => $replica->statuses_id,
                    'created_at' => $replica->created_at,
                    'updated_at' => $replica->updated_at, 
                    'deleted_at' => null,
                ]);
            }

        $status = Status::ofAttendanceCorrection()->where('code', 'approved')->first();
        
        $attcor->approvals()->save(new Approval([
            'is_approved' => 1,
            'note' => $request->note,
            'conducted_by' => Auth::id(),
            'approvable_id' => $attcor->id,
        ]));

        $result = $attcor->update([
            'status_id' => $status->id
        ]);

        return response()->json($result);
    }

    /**
     * Attendance correction reject
     * 
     * @param  \App\Models\AttendanceCorrection  $attcor
     * @return \Illuminate\Http\Response
     */
    public function reject(AttendanceCorrection $attcor, Request $request){
        $status = Status::ofAttendanceCorrection()->where('code', 'rejected')->first();

        $attcor->approvals()->save(new Approval([
            'is_approved' => 0,
            'note' => $request->note,
            'conducted_by' => Auth::id(),
            'approvable_id' => $attcor->id,
        ]));

        $result = $attcor->update([
            'status_id' => $status->id
        ]);
        
        return response()->json($result);
    }
}