<?php

namespace App\Models;

use App\MemfisModel;
use App\Scopes\OrderByColumn;
use Illuminate\Database\Eloquent\Builder;

class Level extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'of',
        'score',
        'description',
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

        static::addGlobalScope(new OrderByColumn('score'));
    }

    /******************************************* SCOPE *******************************************/

    /**
     * Scope a query to only include level of Language proficiency.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfLanguage(Builder $query)
    {
        return $query->where('of', 'language');
    }
}
