<?php

namespace App\Models;

use App\MemfisModel;

class Phone extends MemfisModel
{
    protected $fillable = [
        'number',
        'ext',
        'type_id',
        'is_active',
        'phoneable_type',
        'phoneable_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A phone may have zero or many types.
     *
     * This function will retrieve the type of an phone.
     * See: Type's phones() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Polymorphic: An entity can have zero or many phones.
     *
     * This function will get all of the owning phoneable models.
     * See:
     * - Customer's phones() method for the inverse
     * - Employee's phones() method for the inverse
     *
     * @return mixed
     */
    public function phoneable()
    {
        return $this->morphTo();
    }

}
