<?php

namespace App\Models;

use App\MemfisModel;

class Repeat extends MemfisModel
{
    protected $fillable = [
        'repeatable_type',
        'repeatable_id',
        'type_id',
        'amount',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many addresses.
     *
     * This function will get all of the owning repeatable models.
     * See:
     * - TaskCard's repeats() method for the inverse
     *
     * @return mixed
     */
    public function repeatable()
    {
        return $this->morphTo();
    }

    /**
     * One-to-Many: A repeat may have zero or many type.
     *
     * This function will retrieve the type of a repeat.
     * See: Type's repeats() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
