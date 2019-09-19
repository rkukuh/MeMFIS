<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
    protected $table = 'employee_attendances';

    protected $fillable = [
        'uuid',
        'employee_id',
        'date',
        'in',
        'out',
        'late_in',
        'earlier_out',
        'overtime',
        'status'
    ];

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
}
