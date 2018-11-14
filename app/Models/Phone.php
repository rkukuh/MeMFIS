<?php

namespace App\Models;

use App\MemfisModel;

class Phone extends MemfisModel
{
    protected $fillable = [
        'number',
        'ext',
        'type_id',
        'is_primary',
        'phoneable_id',
        'phoneable_type',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: A customer can have zero or many phones.
     *
     * This function will get all of the owning addressable models.
     * See:
     * - Customer's phones() method for the inverse
     */
    public function phoneable()
    {
        return $this->morphTo();
    }
}
