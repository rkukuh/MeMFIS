<?php

namespace App\Models;

use App\MemfisModel;

class Document extends MemfisModel
{
    protected $fillable = [
        'number',
        'type_id',
        'documentable_id',
        'documentable_type',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: A customer can have zero or many documents.
     *
     * This function will get all of the owning addressable models.
     * See:
     * - Customer's documents() method for the inverse
     */
    public function documentable()
    {
        return $this->morphTo();
    }
}
