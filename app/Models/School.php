<?php

namespace App\Models;

use App\MemfisModel;

class School extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'degree',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Many-to-Many: An employee may have zero or many schools.
     *
     * This function will retrieve all the employees of a school.
     * See: Employee's schools() method for the inverse
     *
     * @return mixed
     */
    public function employees()
    {
        return $this->belongsToMany(Employee::class)
                    ->withTimestamps();
    }
}
