<?php

namespace App\Models;

use App\MemfisModel;

class AttendanceCorrection extends MemfisModel
{
    protected $table = 'attendancecorrections';

    protected $dates = ['correction_date'];

    protected $fillable = [
        'code',
        'employee_id',
        'correction_date',
        'correction_time',
        'description',
        'attendance_id',
        'type_id',
        'status_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-One: An employee attendance have zero or one correction.
     *
     * This function will retrieve correction of a given attendance.
     * See: Attendance Correction's attendance() method for the inverse
     *
     * @return mixed
     */
    public function attendance()
    {
        return $this->belongsTo(EmployeeAttendance::class);
    }

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
     * One-to-Many: Many attendance corrections proposed by one employee.
     *
     * This function will retrieve the employee proposed attendance correction.
     * See: Employee's attendance_corrections() method for the inverse
     *
     * @return mixed
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

     /**
     * One-to-One: An Attendance Correction have one Status Attendance Status.
     *
     * This function will retrieve Status Attendance correction of a given Employee.
     * See: Status attendance_correction() method for the inverse
     *
     * @return mixed
     */
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * One-to-Many: An attendance correction may have zero or many type.
     *
     * This function will retrieve the type of an address.
     * See: Type's attendance_correction() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
