<?php

namespace App\Models;

use App\MemfisModel;

class Status extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'of',
        'description',
    ];

    /******************************************* SCOPE *******************************************/

    /**
     * Scope a query to only include category of customer's component repair.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfCustomerComponentRepair(Builder $query)
    {
        return $query->where('of', 'customer-component-repair');
    }

    /**
     * Scope a query to only include category of employment.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfEmployment(Builder $query)
    {
        return $query->where('of', 'employment');
    }

    /**
     * Scope a query to only include category of marital.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfMarital(Builder $query)
    {
        return $query->where('of', 'marital');
    }
}
