<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeBPJS extends Model
{
    
    protected $fillable = [
        'employee_id',
        'bpjs_id',
        'employee_paid',
        'employee_min_value',
        'employee_max_value',
        'company_paid',
        'company_min_value',
        'company_max_value',
        'created_at',
        'updated_at'
    ];
    

    /**
     * One-to-Many: An EmployeeBpjs have many Employee.
     *
     * This function will retrieve Bpjs of a Employee.
     * See: Employee employee_bpjs() method for the inverse
     *
     * @return mixed
     */
    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
