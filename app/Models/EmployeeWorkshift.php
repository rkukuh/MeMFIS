<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeWorkshift extends Model
{
    protected $table = 'employee_workshift';

    protected $fillable = [
        'employee_id',
        'workshift_id',
        'created_at',
        'updated_at'
    ];

    /**
     * One-to-One: An EmployeeWorkshift have one Employee.
     *
     * This function will retrieve Workshift of a Employee.
     * See: Employee Workshift() method for the inverse
     *
     * @return mixed
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
