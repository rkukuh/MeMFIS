<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeHistories extends Model
{
    protected $table = 'employee_histories';

    protected $fillable = [
        'employee_id',
        'code',
        'first_name',
        'last_name',
        'dob',
        'dob_place',
        'gender',
        'religion',
        'marital_status',
        'nationality',
        'country',
        'city',
        'zip',
        'joined_date',
        'job_tittle_id',
        'position_id',
        'statuses_id',
        'department_id',
        'indirect_supervisor_id',
        'supervisor_id',
        'created_at',
        'updated_at'
    ];

    /**
     * One-to-Many: A Employee may have one or many history.
     *
     * This function will retrieve all the history of a given Employee.
     * See: Employee history() method for the inverse
     *
     * @return mixed
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
