<?php

namespace App\Models;

use App\MemfisModel;

class Price extends MemfisModel
{
    protected $fillable = [
        'priceable_type',
        'priceable_id',
        'amount',
        'level',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many prices.
     *
     * This function will get all of the owning priceable models.
     * See:
     * - Facility's prices() method for the inverse
     * - Item's prices() method for the inverse
     *
     * @return mixed
     */
    public function priceable()
    {
        return $this->morphTo();
    }
}
