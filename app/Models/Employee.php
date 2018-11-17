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
     * Polymorphic: An employee can have zero or many documents.
     *
     * This function will get all of the employee's documents.
     * See: Document's documentable() method for the inverse
     */
    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    /**
     * Polymorphic: An employee can have zero or many emailable.
     *
     * This function will get all of the employee's emailable.
     * See: Email's emailable() method for the inverse
     */
    public function emails()
    {
        return $this->morphMany(Email::class, 'emailable');
    }

    /**
     * Polymorphic: An employee can have zero or many faxable.
     *
     * This function will get all of the employee's faxable.
     * See: Fax's faxable() method for the inverse
     */
    public function faxes()
    {
        return $this->morphMany(Fax::class, 'faxable');
    }

    /**
     * Polymorphic: An employee can have zero or many phones.
     *
     * This function will get all of the employee's phones.
     * See: Phone's phoneable() method for the inverse
     */
    public function phones()
    {
        return $this->morphMany(Phone::class, 'phoneable');
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
