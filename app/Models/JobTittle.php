<?php

namespace App\Models;

use App\MemfisModel;

class JobTittle extends MemfisModel
{
    protected $table = 'jobtittles';

    protected $fillable = [
        'code',
        'name',
        'description',
        'specification'
    ];

    /**
     * One-to-Many: An Jobtittle have many Employee.
     *
     * This function will retrieve Employee of a Job Tittle.
     * See: Employee job_tittle() method for the inverse
     *
     * @return mixed
     */
    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
