<?php

namespace App\Models\Pivots;

use App\Models\Amel;
use App\Models\License;
use App\Models\Employee;
use App\Models\GeneralLicense;
use Illuminate\Database\Eloquent\Relations\Pivot;

class EmployeeLicense extends Pivot
{
    //

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A general license may have zero or many aviation (school) degree.
     *
     * This function will retrieve all the aviation (school) degree of a general license.
     * See: General License's header() method for the inverse
     *
     * @return mixed
     */
    public function general_licenses()
    {
        // This method must have a second parameter as FK column (employee_license_id),
        // so these following error will not thrown:
        // "Too few arguments to function Illuminate\Database\Eloquent\Model::setAttribute()"

        return $this->hasMany(GeneralLicense::class, 'employee_license_id');
    }

    /**
     * One-to-Many: An AME license may have zero or many aircraft rating.
     *
     * This function will retrieve all the aircraft rating of an AME license.
     * See: AME License's header() method for the inverse
     *
     * @return mixed
     */
    public function amels()
    {
        // This method must have a second parameter as FK column (employee_license_id),
        // so these following error will not thrown:
        // "Too few arguments to function Illuminate\Database\Eloquent\Model::setAttribute()"

        return $this->hasMany(Amel::class, 'employee_license_id');
    }

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
