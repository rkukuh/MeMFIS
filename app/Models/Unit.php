<?php

namespace App\Models;

use App\MemfisModel;
use Illuminate\Database\Eloquent\Builder;

class Unit extends MemfisModel
{
    protected $fillable = [
        'name',
        'symbol',
        'type_id',
    ];

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
}
