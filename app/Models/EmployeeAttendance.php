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
     * One-to-Many (self-join): An employee attendance may have none or many corrected-attendance.
     *
     * This function will retrieve the corrected-attendance of a Employee Attendance, if any.
     * See: Employee Attendance's parent() method for the inverse
     *
     * @return mixed
     */
    public function childs()
    {
        return $this->hasMany(EmployeeAttendance::class, 'parent_id');
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
     * Polymorphic: An entity can have zero or many statuses.
     *
     * This function will get all of the jobcard's statuses.
     * See: Status's statusable() method for the inverse
     *
     * @return mixed
     */
    public function statuses()
    {
        return $this->morphMany(Status::class, 'statusables');
    }

    /**
     * One-to-Many (self-join): An employee attendance may have none or many corrected-attendance.
     *
     * This function will retrieve the parent of a corrected-attendance.
     * See: Employee Attendance's childs() method for the inverse
     *
     * @return mixed
     */
    public function parent()
    {
        return $this->belongsTo(EmployeeAttendance::class, 'parent_id')->withTrashed();
    }

    /*************************************** ACCESSOR ****************************************/

    // to do accessor 
    public function getLeaveAttribute(){
        // first filter by $this->employee
        $leave = Leave::where('employee_id', $this->employee_id)
        // then filter by $this->date
            ->whereDate('start_date','<=',$this->date)
            ->whereDate('end_date', '>=', $this->date)
        // only approved leave
            ->whereHas('approvals')
        // resulting is there any leave on that day by that person
            ->first();

        return $leave;
        // change status value "on leave"
    }
}
