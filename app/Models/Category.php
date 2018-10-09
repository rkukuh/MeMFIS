<?php

namespace App\Models;

use App\MemfisModel;
use App\Scopes\OrderByColumn;

class Category extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'of',
        'description',
        'account_code',
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
     * M-M Polymorphic: An item can have zero or many categories.
     *
     * This function will get all of the items that are assigned to this category.
     * See: Item's categories() method for the inverse
     */
    public function items()
    {
        return $this->morphedByMany(Item::class, 'categorizable');
    }
}
