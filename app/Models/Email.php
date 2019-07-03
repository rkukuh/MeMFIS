<?php

namespace App\Models;

use App\MemfisModel;

class Email extends MemfisModel
{
    protected $fillable = [
        'address',
        'type_id',
        'is_active',
        'emailable_type',
        'emailable_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: An email may have zero or many type.
     *
     * This function will retrieve the type of an email.
     * See: Type's email() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Polymorphic: An entity can have zero or many emails.
     *
     * This function will get all of the owning addressable models.
     * See:
     * - Customer's emails() method for the inverse
     * - Employee's emails() method for the inverse
     *
     * @return mixed
     */
    public function emailable()
    {
        return $this->morphTo();
    }

}
