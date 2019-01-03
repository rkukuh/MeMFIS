<?php

namespace App\Models;

use App\MemfisModel;

class Aircraft extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'manufacturer_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * M-M Polymorph: An AMEL content could be aircraft and/or engine.
     *
     * This function will aet all of the aircraft's AMEL.
     * Amel's amelable() method for the inverse
     *
     * @return mixed
     */
    public function amels()
    {
        return $this->morphToMany(Amel::class, 'amelable');
    }

    /**
     * One-to-Many: An aircraft may have zero or many access.
     *
     * This function will retrieve the accesses of an aircraft.
     * See: AircraftAccess's aircraft() method for the inverse
     *
     * @return mixed
     */
    public function accesses()
    {
        return $this->hasMany(AircraftAccess::class);
    }

    /**
     * One-to-Many: A manufacturer may have zero or many aircrafts.
     *
     * This function will retrieve the manufacturer of an aircraft.
     * See: Manufacturer's aircrafts() method for the inverse
     *
     * @return mixed
     */
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

}
