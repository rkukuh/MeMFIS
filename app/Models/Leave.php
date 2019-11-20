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
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all AttendanceCorrection's approvals.
     * See: Approvals's approvable() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }

    /**
     * One-to-Many: Many leave proposed by one employee.
     *
     * This function will retrieve the employee proposed for a leave.
     * See: Employee's leave() method for the inverse
     *
     * @return mixed
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
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

     /**
     * One-to-One: An leave have one Status.
     *
     * This function will retrieve status of a given leave.
     * See: Status leave() method for the inverse
     *
     * @return mixed
     */
    // public function status()
    // {
    //     return $this->belongsTo(Status::class);
    // }

}
