<?php

namespace App\Models;

use App\MemfisModel;

class Station extends MemfisModel
{
    protected $fillable = [
        'name',
        'stationable_type',
        'stationable_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many stations.
     *
     * This function will get all of the owning stationable models.
     * See:
     * - Aircraft's stations() method for the inverse
     */
    public function stationable()
    {
        return $this->morphTo();
    }
}
