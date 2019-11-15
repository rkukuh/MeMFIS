<?php

namespace App\Models;

use App\MemfisModel;

class EmployeeAttendance extends MemfisModel
{
    protected $table = 'employee_attendances';

    protected $fillable = [
        'uuid',
        'employee_id',
        'statuses_id',
        'date',
        'in',
        'out',
        'late_in',
        'earlier_out',
        'overtime',
        'status'
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
    public function attendance_correction()
    {
        return $this->hasOne(AttendanceCorrection::class, 'attendance_id');
    }
    /**
     * One-to-One: An employee attendance have zero or one leave.
     *
     * This function will retrieve leave of a given attendance.
     * See: leave's attendance() method for the inverse
     *
     * @return mixed
     */
    public function attendance_leave()
    {
        return $this->hasOne(leave::class, 'attendance_id');
    }

    /**
     * One-to-One: An employee attendance have zero or one overtime.
     *
     * This function will retrieve overtime of a given attendance.
     * See: Overtime's attendance() method for the inverse
     *
     * @return mixed
     */
    public function attendance_overtime()
    {
        return $this->hasOne(Overtime::class, 'attendance_id');
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
    public function statuses()
    {
        return $this->belongsTo(Status::class);
    }
}
