<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeBPJS extends Model
{
    
    

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
