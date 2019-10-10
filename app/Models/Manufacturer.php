<?php

namespace App\Models;

use App\MemfisModel;
use App\Scopes\OrderByColumn;

class Manufacturer extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
    ];

    /******************************************* BOOT ********************************************/

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new OrderByColumn('name'));
    }

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A manufacturer may have zero or many aircrafts.
     *
     * This function will retrieve all the aircrafts of a manufacturer.
     * See: Aircraft's manufacturer() method for the inverse
     *
     * @return mixed
     */
    public function aircrafts()
    {
        return $this->hasMany(Aircraft::class);
    }

    /**
     * One-to-Many: A manufacturer can create zero or many items.
     *
     * This function will get a manufacturer of an item.
     *
     * @return mixed
     */
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
