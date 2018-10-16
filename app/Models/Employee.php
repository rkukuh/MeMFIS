<?php

namespace App\Models;

use App\MemfisModel;
use App\Models\Pivots\GeneralLicense;

class Employee extends MemfisModel
{
    protected $fillable = [
        'code',
        'first_name',
        'middle_name',
        'last_name',
        'dob',
        'gender',
        'hired_at',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Many-to-Many: An employee may have zero or many general license.
     *
     * This function will retrieve the general licenses of an employee.
     * See: GeneralLicense's employees() method for the inverse
     *
     * @return mixed
     */
    public function licenses()
    {
        return $this->belongsToMany(License::class)
                    ->as('licensed_employee')
                    ->withPivot(
                        'code',
                        'issued_at',
                        'valid_until',
                        'revoke_at'
                    )
                    ->withTimestamps();
    }
}
