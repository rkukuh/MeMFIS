<?php

namespace App\Models;

use App\MemfisModel;

class AttendanceCorrection extends MemfisModel
{
    protected $table = 'attendancecorrections';

    protected $dates = ['correction_date'];

    protected $fillable = [
        'correction_date',
        'correction_time',
        'employee_id',
        'status_id',
        'description_id',
        'type_id',
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
}
