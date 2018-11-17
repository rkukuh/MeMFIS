<?php

namespace App\Models;

use App\MemfisModel;

class Website extends MemfisModel
{
    protected $fillable = [
        'url',
        'type_id',
        'websiteable_id',
        'websiteable_type',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A website may have zero or many type.
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
}
