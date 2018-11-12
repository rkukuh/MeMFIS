<?php

namespace App\Models;

use App\MemfisModel;

class Amel extends MemfisModel
{
    protected $fillable = [
        'amelable_id',
        'amelable_type',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: An AME license may have zero or many aircraft rating.
     *
     * This function will retrieve the header of an AME license.
     * See: Employee License's amels() method for the inverse
     *
     * @return mixed
     */
    public function header()
    {
        return $this->belongsTo(EmployeeLicense::class, 'employee_license_id');
    }
}
