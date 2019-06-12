<?php

namespace App\Models;

use App\MemfisModel;
use App\Scopes\OrderByColumn;
use Illuminate\Database\Eloquent\Builder;

class Category extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'of',
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

    /******************************************* SCOPE *******************************************/

    /**
     * Scope a query to only include category of item.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfItem(Builder $query)
    {
        return $query->where('of', 'item');
    }

    /**
     * Scope a query to only include category of task card EO.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfTaskCardEO(Builder $query)
    {
        return $query->where('of', 'taskcard-eo');
    }

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * M-M Polymorphic: An item can have zero or many categories.
     *
     * This function will get all of the items that are assigned to this category.
     * See: Item's categories() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->morphedByMany(Item::class, 'categorizable');
    }
}
