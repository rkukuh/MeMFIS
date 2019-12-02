<?php

namespace App\Models;

use App\MemfisModel;

class Country extends MemfisModel
{
    protected $fillable = [
        'name',
        'iso_2',
        'iso_3',
        'phone_code'
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A Country have zero or many Employees.
     *
     * This function will retrieve employees of a given Country.
     * See: Country's employee() method for the inverse
     *
     * @return mixed
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
