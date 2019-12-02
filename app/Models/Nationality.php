<?php

namespace App\Models;

use App\MemfisModel;

class Nationality extends MemfisModel
{
    protected $table = 'nationalities';

    protected $fillable = [
        'nationality'
    ];

     /**
     * Many-to-Many: An employee may have zero or many nationalities.
     *
     * This function will retrieve all the nationalities of an employee.
     * See: Employee's nationalities() method for the inverse
     *
     * @return mixed
     */
    public function employees()
    {
        return $this->belongsToMany(Employee::class)
                    ->withTimestamps();
    }
}
