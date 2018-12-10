<?php

namespace App\Models;

use App\MemfisModel;

class Language extends MemfisModel
{
    protected $fillable = [
        'name',
        'iso_639_1',
        'iso_639_2',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * Many-to-Many: An employee may have zero or many languages.
     *
     * This function will retrieve all the employees of an language.
     * See: Language's employees() method for the inverse
     *
     * @return mixed
     */
    public function employees()
    {
        return $this->belongsToMany(Employee::class)
                    ->withTimestamps();
    }

}
