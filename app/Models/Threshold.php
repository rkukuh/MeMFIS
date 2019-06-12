<?php

namespace App\Models;

use App\MemfisModel;

class Threshold extends MemfisModel
{
    protected $fillable = [
        'thresholdable_type',
        'thresholdable_id',
        'type_id',
        'amount',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: An entity can have zero or many addresses.
     *
     * This function will get all of the owning thresholdable models.
     * See:
     * - TaskCard's thresholds() method for the inverse
     *
     * @return mixed
     */
    public function thresholdable()
    {
        return $this->morphTo();
    }

    /**
     * One-to-Many: A threshold may have zero or many type.
     *
     * This function will retrieve the type of a threshold.
     * See: Type's thresholds() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
