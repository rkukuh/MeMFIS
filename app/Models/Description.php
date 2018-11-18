<?php

namespace App\Models;

use App\MemfisModel;

class Description extends MemfisModel
{
    protected $fillable = [
        'body',
        'descriptionable_id',
        'descriptionable_type',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity may have zero or many description.
     *
     * This function will get all of the owning descriptionable models.
     * See:
     * - ?
     */
    public function descriptionable()
    {
        return $this->morphTo();
    }
}
