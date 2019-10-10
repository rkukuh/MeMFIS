<?php

namespace App\Models;

use App\MemfisModel;

class Document extends MemfisModel
{
    protected $fillable = [
        'number',
        'type_id',
        'documentable_type',
        'documentable_id',
        'created_at',
        'updated_at'
    ];

    /*************************************** RELATIONSHIP ****************************************/

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

    /**
     * Polymorphic: An entity can have zero or many documents.
     *
     * This function will get all of the owning documentable models.
     * See:
     * - Customer's documents() method for the inverse
     * - Employee's documents() method for the inverse
     *
     * @return mixed
     */
    public function documentable()
    {
        return $this->morphTo();
    }
}
