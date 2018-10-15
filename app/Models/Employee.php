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
    public function general_licenses()
    {
        return $this->belongsToMany(GeneralLicense::class)
                    ->as('general_license')
                    ->withPivot(
                        'code',
                        'aviation_degree',
                        'aviation_degree_code',
                        'exam_no',
                        'exam_date',
                        'attendance_no',
                        'issued_at',
                        'revoke_at'
                    )
                    ->withTimestamps();
    }
}
