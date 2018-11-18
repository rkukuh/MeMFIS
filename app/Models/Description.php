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
     * Polymorphic: An entity may have zero or many descriptions.
     *
     * This function will get all of the owning descriptionable models.
     * See:
     * - Category's descriptions() method for the inverse
     */
    public function descriptionable()
    {
        return $this->morphTo();
    }
}
