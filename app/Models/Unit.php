<?php

namespace App\Models;

use App\MemfisModel;
use App\Scopes\OrderByColumn;
use Illuminate\Database\Eloquent\Builder;

class Unit extends MemfisModel
{
    protected $fillable = [
        'name',
        'symbol',
        'type_id',
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
     * Scope a query to only include type of dimension.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfDimension(Builder $query)
    {
        $id = Type::ofUnit()->where('code', 'dimension')->first()->id;

        return $query->where('type_id', $id);
    }

    /**
     * Scope a query to only include type of quantity.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfQuantity(Builder $query)
    {
        $id = Type::ofUnit()->where('code', 'quantity')->first()->id;

        return $query->where('type_id', $id);
    }

    /**
     * Scope a query to only include type of weight.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfWeight(Builder $query)
    {
        $id = Type::ofUnit()->where('code', 'weight')->first()->id;

        return $query->where('type_id', $id);
    }

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A unit may have zero or many type.
     *
     * This function will retrieve the type of an unit.
     * See: Type's units() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Many-to-Many: An item may have zero or many unit.
     *
     * This function will retrieve the items of a unit.
     * See: Item's units() method for the inverse
     *
     * @return mixed
     */
    public function items()
    {
        return $this->belongsToMany(Item::class)
                    ->as('uom')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
