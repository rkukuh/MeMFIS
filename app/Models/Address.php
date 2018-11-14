<?php

namespace App\Models;

use App\MemfisModel;

class Address extends MemfisModel
{
    protected $fillable = [
        'type_id',
        'addresss',
        'latitude',
        'longitude',
        'addressable_id',
        'addressable_type',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: A customer can have zero or many addresses.
     *
     * This function will get all of the owning addressable models.
     * See:
     * - Customer's addresses() method for the inverse
     */
    public function addressable()
    {
        return $this->morphTo();
    }

    /**
     * One-to-Many: An address may have zero or many type.
     *
     * This function will retrieve the type of an address.
     * See: Type's addresses() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
