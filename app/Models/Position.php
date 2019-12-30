<?php

namespace App\Models;

use App\MemfisModel;

class Position extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Many-to-Many: A Position may have one or many Benefit.
     *
     * This function will retrieve all the Benefits of an Position.
     * See: Benefit's positions() method for the inverse
     *
     * @return mixed
     */
    public function benefits()
    {
        return $this->belongsToMany(Benefit::class)
                    ->withPivot(
                        'min',
                        'max'
                    )
                    ->wherePivot('deleted_at', null)
                    ->withTimestamps();
    }

    public function benefit_current()
    {
        return $this->belongsToMany(Benefit::class)
                    ->withPivot(
                        'min',
                        'max'
                    )
                    ->whereNull('benefit_position.updated_at')
                    ->withTimestamps();
    }

    public function benefit_history()
    {
        return $this->belongsToMany(Benefit::class)
                    ->withPivot(
                        'min',
                        'max'
                    )
                    ->whereNotNull('benefit_position.updated_at')
                    ->orderBy('benefit_position.updated_at','desc')
                    ->withTimestamps();
    }
}
