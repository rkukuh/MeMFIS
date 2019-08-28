<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeProvisions extends Model
{
    protected $fillable = [
        'employee_id',
        'maximum_overtime',
        'minimum_overtime',
        'holiday_overtime',
        'pph',
        'late_tolerance',
        'absence_punishment',
        'created_at',
        'updated_at'
    ];
    
    /**
     * One-to-Many: An EmployeeProvisions have many Employee.
     *
     * This function will retrieve Provisions of a Employee.
     * See: Employee employee_provisions() method for the inverse
     *
     * @return mixed
     */
    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}


