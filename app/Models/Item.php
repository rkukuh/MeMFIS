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
     * M-M Polymorphic: An item can have none or many categories.
     *
     * This function will get all of the categories that are assigned to this item.
     * See: Category's items() method for the inverse
     */
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
}
