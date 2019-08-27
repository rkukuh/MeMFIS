<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeProvisions extends Model
{
    
    
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


