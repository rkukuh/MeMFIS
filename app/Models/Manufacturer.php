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
}
