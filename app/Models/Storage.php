<?php

namespace App\Models;

use App\MemfisModel;

class Storage extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'account_code',
        'is_active',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Many-to-Many: An item may have zero or many storage.
     *
     * This function will retrieve the items of a storage.
     * See: Item's storages() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class)
                    ->withPivot('min', 'max')
                    ->withTimestamps();
    }
}
