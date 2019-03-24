<?php

namespace App\Models;

use App\MemfisModel;

class Price extends MemfisModel
{
    protected $fillable = [
        'priceable_type',
        'priceable_id',
        'amount',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many prices.
     *
     * This function will get all of the owning priceable models.
     * See:
     * - Item's prices() method for the inverse
     */
    public function priceable()
    {
        return $this->morphTo();
    }
}
