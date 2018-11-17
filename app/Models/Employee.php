<?php

namespace App\Models;

use App\MemfisModel;
use App\Models\Pivots\EmployeeLicense;

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

    protected $dates = ['hired_at'];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An employee can have zero or many addresses.
     *
     * This function will get all of the employee's addresses.
     * See: Address' addressable() method for the inverse
     */
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    /**
     * Many-to-Many: An employee may have zero or many license.
     *
     * This function will retrieve all the licenses of an employee.
     * See: License's employees() method for the inverse
     *
     * @return mixed
     */
    public function licenses()
    {
        return $this->belongsToMany(License::class)
                    ->using(EmployeeLicense::class)
                    ->withPivot(
                        'code',
                        'issued_at',
                        'valid_until',
                        'revoke_at'
                    )
                    ->withTimestamps();
    }

    /**
     * One-Way: An employee may have zero or many general license.
     *
     * @return mixed
     */
    public function general_licenses()
    {
        return $this->hasMany(EmployeeLicense::class)
                    ->where('license_id', License::ofGeneralLicense()->first()->id);
    }

    /**
     * One-Way: An employee may have zero or many AME License (by DGCA).
     *
     * @return mixed
     */
    public function amels_dgca()
    {
        return $this->hasMany(EmployeeLicense::class)
                    ->where('license_id', License::ofAMELDGCA()->first()->id);
    }
}
