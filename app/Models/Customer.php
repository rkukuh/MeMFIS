<?php

namespace App\Models;

use App\MemfisModel;

class Customer extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'attention',
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
     * Polymorphic: A customer can have zero or many emails.
     *
     * This function will get all of the customer's emails.
     * See: Email's emailable() method for the inverse
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
     */
    public function faxes()
    {
        return $this->morphMany(Fax::class, 'faxable');
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
     * One-to-Many: A project must have a customer
     *
     * This function will retrieve all the projects of a customer.
     * See: Project's customer() method for the inverse
     *
     * @return mixed
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    /**
     * One-to-Many: A quotation may have one customer.
     *
     * This function will retrieve all the quotations of a customer.
     * See: Quotation's customer() method for the inverse
     *
     * @return mixed
     */
    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }

    /**
     * Polymorphic: A customer can have zero or many websites.
     *
     * This function will get all of the customer's websites.
     * See: Website's websiteable() method for the inverse
     */
    public function websites()
    {
        return $this->morphMany(Website::class, 'websiteable');
    }

    /**
     * One-to-Many: A customer may have zero or one account code (journal).
     *
     * This function will retrieve the account code (journal) of an customer.
     * See: Journal's customers() method for the inverse
     *
     * @return mixed
     */
    public function journal()
    {
        return $this->belongsTo(Journal::class, 'account_code');
    }

    /**
     * One-Way: A customer may have zero or one payment term.
     *
     * @return mixed
     */
    public function term_of_payment()
    {
        return $this->belongsTo(Type::class, 'payment_term');
    }

    /***************************************** ACCESSOR ******************************************/

    /**
     * Get the item's account code and name.
     *
     * @param  string  $value
     * @return string
     */
    public function getAccountCodeAndNameAttribute($value)
    {
        if (isset($this->journal)) {
            return $this->journal->code.' - '.$this->journal->name;
        }
    }
}
