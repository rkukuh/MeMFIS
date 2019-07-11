<?php

namespace App\Models;

use App\MemfisModel;

class Website extends MemfisModel
{
    protected $fillable = [
        'url',
        'type_id',
        'websiteable_type',
        'websiteable_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A website may have zero or many types.
     *
     * This function will retrieve the type of an website.
     * See: Type's websites() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Polymorphic: An entity can have zero or many websites.
     *
     * This function will get all of the owning websiteable models.
     * See:
     * - Customer's websites() method for the inverse
     * - Employee's websites() method for the inverse
     *
     * @return mixed
     */
    public function websiteable()
    {
        return $this->morphTo();
    }
}
