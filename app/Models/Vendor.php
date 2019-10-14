<?php

namespace App\Models;

use App\MemfisModel;

class Vendor extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'attention',
        'payment_term',
        'banned_at',
    ];
    
    protected $dates = ['banned_at'];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Polymorphic: A customer can have zero or many addresses.
     *
     * This function will get all of the customer's addresses.
     * See: Address' addressable() method for the inverse
     *
     * @return mixed
     */
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    /**
     * Polymorphic: An entity can have zero or many bank accounts.
     *
     * This function will get all Vendor's bank accounts.
     * See: BankAccount's bank_accountable() method for the inverse
     *
     * @return mixed
     */
    public function bank_accounts()
    {
        return $this->morphMany(BankAccount::class, 'bank_accountable');
    }

    /**
     * Polymorphic: A customer can have zero or many phones.
     *
     * This function will get all of the customer's phones.
     * See: Phone's phoneable() method for the inverse
     *
     * @return mixed
     */
    public function phones()
    {
        return $this->morphMany(Phone::class, 'phoneable');
    }

    /**
     * Polymorphic: A customer can have zero or many documents.
     *
     * This function will get all of the customer's documents.
     * See: Document's documentable() method for the inverse
     *
     * @return mixed
     */
    public function documents()
    {
        return $this->morphMany(Document::class, 'documentable');
    }

    /**
     * Polymorphic: A customer can have zero or many emails.
     *
     * This function will get all of the customer's emails.
     * See: Email's emailable() method for the inverse
     *
     * @return mixed
     */
    public function emails()
    {
        return $this->morphMany(Email::class, 'emailable');
    }

    /**
     * Polymorphic: A customer can have zero or many faxes.
     *
     * This function will get all of the customer's faxes.
     * See: Fax's faxable() method for the inverse
     *
     * @return mixed
     */
    public function faxes()
    {
        return $this->morphMany(Fax::class, 'faxable');
    }

    /**
     * One-to-Many: A purchase order may have one vendor.
     *
     * This function will retrieve all the purchase orders of a vendor.
     * See: PurchaseOrder's vendor() method for the inverse
     *
     * @return mixed
     */
    public function purchase_orders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }

}
