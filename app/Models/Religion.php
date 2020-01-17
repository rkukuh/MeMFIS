<?php

namespace App\Models;

use App\MemfisModel;

class Religion extends MemfisModel
{
    protected $table = 'religions';

    protected $fillable = [
        'code',
        'number',
        'description'
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A Religion have zero or many Employees.
     *
     * This function will retrieve employees of a given Country.
     * See: Country's employee() method for the inverse
     *
     * @return mixed
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
