<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeBenefit extends Model
{
    

    /**
     * One-to-Many: An EmployeeBenefit have many Employee.
     *
     * This function will retrieve Benefit of a Employee.
     * See: Employee employee_benefit() method for the inverse
     *
     * @return mixed
     */
    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
