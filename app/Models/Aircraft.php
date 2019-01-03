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
     * Polymorphic: An entity can have zero or many accesses.
     *
     * This function will get all of the aircraft's accesses.
     * See: Access's accessable() method for the inverse
     */
    public function accesses()
    {
        return $this->morphMany(Access::class, 'accessable');
    }

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
