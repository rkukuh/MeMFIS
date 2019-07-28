<?php

namespace App\Models;

use App\MemfisModel;

class Benefit extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'base_calculation',
        'prorate_calculation',
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: A Benefit may have zero or one base calculation.
     *
     * @return mixed
     */
    public function base_calculation()
    {
        return $this->belongsTo(Type::class, 'base_calculation');
    }

    /**
     * Many-to-Many: A Position may have one or many Benefit.
     *
     * This function will retrieve all the Positions of a given Benefit.
     * See: Position's benefits() method for the inverse
     *
     * @return mixed
     */
    public function positions()
    {
        return $this->belongsToMany(Position::class)
                    ->withPivot(
                        'min',
                        'max'
                    )
                    ->withTimestamps();
    }

    /**
     * One-Way: A Benefit may have zero or one prorate calculation.
     *
     * @return mixed
     */
    public function prorate_calculation()
    {
        return $this->belongsTo(Type::class, 'prorate_calculation');
    }
}
