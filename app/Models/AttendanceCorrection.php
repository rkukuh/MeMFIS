<?php

namespace App\Models;

use App\MemfisModel;

class AttendanceCorrection extends MemfisModel
{
    protected $fillable = [
        "uuid",
        "employee_id",
        "statuses_id",
        "date",
        "time",
        "desc"
    ];

    /**
     * One-to-one: An employee may have zero or many attendance.
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
     * One-to-One: An AttendaceCorrection have one Status Attendance Correction.
     *
     * This function will retrieve Status Attendance of a given Employee.
     * See: Status employee() method for the inverse
     *
     * @return mixed
     */
    public function statuses()
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
