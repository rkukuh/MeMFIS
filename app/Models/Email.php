<?php

namespace App\Models;

use App\MemfisModel;

class Email extends MemfisModel
{
    protected $fillable = [
        'address',
        'type_id',
        'is_primary',
        'emailable_id',
        'emailable_type',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: A customer can have zero or many emails.
     *
     * This function will get all of the owning addressable models.
     * See:
     * - Customer's emails() method for the inverse
     */
    public function emailable()
    {
        return $this->morphTo();
    }

    /**
     * One-to-Many: A email may have zero or many type.
     *
     * This function will retrieve the type of a email.
     * See: Type's emails() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

}
