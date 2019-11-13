<?php

namespace App\Models;

use App\MemfisModel;

class Overtime extends MemfisModel
{
    protected $fillable = [
        "uuid",
        "code",
        "employee_id",
        "status_id",
        "date",
        "start",
        "end",
        "total",
        "desc"
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-One: An employee attendance have zero or one overtime.
     *
     * This function will retrieve overtime of a given attendance.
     * See: Employee Attendance's attendance_overtime() method for the inverse
     *
     * @return mixed
     */
    public function attendance()
    {
        return $this->belongsTo(EmployeeAttendance::class);
    }

    /**
     * One-to-Many: An employee may have zero or many attendance.
     *
     * This function will retrieve the employees of a attendance.
     * See: Employee employee_attendance() method for the inverse
     *
     * @return mixed
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * One-to-One: An Employee have one Status Attendance.
     *
     * This function will retrieve Status Attendance of a given Employee.
     * See: Status employee() method for the inverse
     *
     * @return mixed
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

     /**
     * Polymorphic: An entity can have zero or many approvals.
     *
     * This function will get all Overtime's approvals.
     * See: Approvals's approvable() method for the inverse
     *
     * @return mixed
     */
    public function approvals()
    {
        return $this->morphMany(Approval::class, 'approvable');
    }
}
