<?php

namespace App\Models;

use App\MemfisModel;

class AircraftAccess extends MemfisModel
{
    protected $table = 'aircraft_accesses';

    protected $fillable = [
        'name',
        'aircraft_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: An aircraft may have zero or many access.
     *
     * This function will retrieve the aircraft of an access.
     * See: Aircraft's zones() method for the inverse
     *
     * @return mixed
     */
    public function aircraft()
    {
        return $this->belongsTo(Aircraft::class);
    }
}
