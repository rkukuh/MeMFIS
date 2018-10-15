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
     * This function will retrieve the aircrafts of a manufacturer.
     * See: Aircraft's manufacturer() method for the inverse
     *
     * @return mixed
     */
    public function aircrafts()
    {
        return $this->hasMany(Aircraft::class);
    }
}
