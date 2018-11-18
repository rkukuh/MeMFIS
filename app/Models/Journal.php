<?php

namespace App\Models;

use App\MemfisModel;

class Journal extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'type_id',
        'level',
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A journal may have zero or many types.
     *
     * This function will retrieve the type of a journal.
     * See: Type's journals() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * One-to-Many: A customer may have zero or one account code (journal).
     *
     * This function will retrieve all customers of an account code (journal).
     * See: Customer's account_code() method for the inverse
     *
     * @return mixed
     */
    public function customers()
    {
        return $this->hasMany(Customer::class, 'account_code');
    }

    /**
     * One-to-Many: An item may have zero or one account code (journal).
     *
     * This function will retrieve all items of an account code (journal).
     * See: Item's account_code() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->hasMany(Item::class, 'account_code');
    }

}
