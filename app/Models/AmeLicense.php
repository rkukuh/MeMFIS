<?php

namespace App\Models;

use App\MemfisModel;

class AmeLicense extends MemfisModel
{
    protected $fillable = [
        'aircraft_id',
        'type_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: An AME license may have zero or many aircraft rating.
     *
     * This function will retrieve the header of an AME license.
     * See: Employee License's ame_licenses() method for the inverse
     *
     * @return mixed
     */
    public function header()
    {
        return $this->belongsTo(EmployeeLicense::class, 'employee_license_id');
    }
}
