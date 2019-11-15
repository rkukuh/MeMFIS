<?php

namespace App\Models;

use App\MemfisModel;

class Leave extends MemfisModel
{
    protected $fillable = [
        'code',
        'start_date',
        'end_date',
        'employee_id',
        'status_id',
        'attendance_id',
        'leavetype_id',
        'description',
    ];
    
    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-One: An employee attendance have zero or one leave.
     *
     * This function will retrieve leave of a given attendance.
     * See: Employee Attendance's attendance_leave() method for the inverse
     *
     * @return mixed
     */
    public function attendance()
    {
        return $this->belongsTo(EmployeeAttendance::class);
    }

    /**
     * One-to-Many: A leave have one leave type.
     *
     * This function will retrieve leave type of a given leave.
     * See: Leave Type's leave() method for the inverse
     *
     * @return mixed
     */
    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class);
    }
}
