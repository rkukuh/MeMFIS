<?php

namespace App\Models;

use App\MemfisModel;
use App\Models\Pivots\EmployeeLicense;

class Amel extends MemfisModel
{
    protected $fillable = [
        'rating',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: An AMEL may have zero or many aircraft rating.
     *
     * This function will retrieve the header of an AMEL.
     * See: Employee License's amels() method for the inverse
     *
     * @return mixed
     */
    public function header()
    {
        return $this->belongsTo(EmployeeLicense::class, 'employee_license_id');
    }

    /**
     * M-M Polymorph: An AMEL content could be an aircraft.
     *
     * This function will get all of the aircrafts that are assigned this AMEL.
     * See: Aircraft's amels() method for the inverse
     *
     * @return mixed
     */
    public function aircrafts()
    {
        return $this->morphedByMany(Aircraft::class, 'amelable');
    }

    /**
     * M-M Polymorph: An AMEL content could be an item.
     *
     * This function will get all of the items that are assigned this AMEL.
     * See: Item's amels() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->morphedByMany(Item::class, 'amelable');
    }
}
