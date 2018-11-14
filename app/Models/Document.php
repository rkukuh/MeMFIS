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

    /**
     * One-to-Many: A document may have zero or many type.
     *
     * This function will retrieve the type of a document.
     * See: Type's documents() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
