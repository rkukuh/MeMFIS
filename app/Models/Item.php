<?php

namespace App\Models;

use App\MemfisModel;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Item extends MemfisModel implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'code',
        'name',
        'barcode',
        'description',
        'is_ppn',
        'ppn_amount',
        'is_stock',
        'account_code',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * M-M Polymorphic: An item can have zero or many categories.
     *
     * This function will get all of the categories that are assigned to this item.
     * See: Category's items() method for the inverse
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }

    /**
     * Many-to-Many: An item may have zero or many unit.
     *
     * This function will retrieve the units of an item.
     * See: Unit's items() method for the inverse
     *
     * @return mixed
     */
    public function units()
    {
        return $this->belongsToMany(Unit::class)
                    ->as('uom')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
