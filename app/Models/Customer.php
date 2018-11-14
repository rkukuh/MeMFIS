<?php

namespace App\Models;

use App\MemfisModel;

class Customer extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'payment_term',
        'banned_at',
        'account_code',
    ];

    protected $dates = ['banned_at'];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: A customer can have zero or many addresses.
     *
     * This function will get all of the customer's addresses.
     * See: Address' addressable() method for the inverse
     */
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    /**
     * Polymorphic: A customer can have zero or many documents.
     *
     * This function will get all of the customer's documents.
     * See: Document's documentable() method for the inverse
     */
    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    /**
     * Polymorphic: A customer can have zero or many phones.
     *
     * This function will get all of the customer's phones.
     * See: Phone's phoneable() method for the inverse
     */
    public function phones()
    {
        return $this->morphMany(Phone::class, 'phoneable');
    }

    /**
     * Polymorphic: A customer can have zero or many emailable.
     *
     * This function will get all of the customer's emailable.
     * See: Email's emailable() method for the inverse
     */
    public function emails()
    {
        return $this->morphMany(Email::class, 'emailable');
    }

    /**
     * Polymorphic: A customer can have zero or many faxable.
     *
     * This function will get all of the customer's faxable.
     * See: Email's faxable() method for the inverse
     */
    public function faxes()
    {
        return $this->morphMany(Fax::class, 'faxable');
    }
}
