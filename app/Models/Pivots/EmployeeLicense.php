<?php

namespace App\Models\Pivots;

use App\Models\License;
use App\Models\Employee;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeeLicense extends Pivot
{
    //

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: A license must have an employee assigned to.
     *
     * @return mixed
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * One-Way: A license must have its own type.
     *
     * @return mixed
     */
    public function license()
    {
        return $this->belongsTo(License::class);
    }
}
