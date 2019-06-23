<?php

namespace App\Models;

use App\MemfisModel;

class Facility extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'note',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: A Facility can have zero or many prices.
     *
     * This function will get all of the Facility's prices.
     * See: Price's priceable() method for the inverse
     *
     * @return mixed
     */
    public function prices()
    {
        return $this->morphMany(Price::class, 'priceable');
    }
}
