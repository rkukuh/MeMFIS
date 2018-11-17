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

    /**
     * One-to-Many: A phone may have zero or many type.
     *
     * This function will retrieve the type of a phone.
     * See: Type's phones() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

}
