<?php

namespace App\Models;

use App\MemfisModel;

class History extends MemfisModel
{
    protected $fillable = [
        'data',
        'user_id'
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many histories.
     *
     * This function will get all of the owning accessable models.
     * See:
     * - Employee's historiable() method for the inverse
     *
     * @return mixed
     */
    public function historiable()
    {
        return $this->morphTo();
    }

}
