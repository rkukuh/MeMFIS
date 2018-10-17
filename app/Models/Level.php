<?php

namespace App\Models;

use App\MemfisModel;
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
