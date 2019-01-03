<?php

namespace App\Models;

use App\MemfisModel;

class Access extends MemfisModel
{
    protected $fillable = [
        'name',
        'accessable_id',
        'accessable_type',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many accesses.
     *
     * This function will get all of the owning accessable models.
     * See:
     * - Aircraft's accesses() method for the inverse
     */
    public function accessable()
    {
        return $this->morphTo();
    }
}
