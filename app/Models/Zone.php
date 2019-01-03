<?php

namespace App\Models;

use App\MemfisModel;

class Zone extends MemfisModel
{
    protected $fillable = [
        'name',
        'zoneable_id',
        'zoneable_type',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many zones.
     *
     * This function will get all of the owning zoneable models.
     * See:
     * - Aircraft's zones() method for the inverse
     */
    public function zoneable()
    {
        return $this->morphTo();
    }
}
