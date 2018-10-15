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
