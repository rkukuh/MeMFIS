<?php

namespace App\Models;

use App\MemfisModel;

class Branch extends MemfisModel
{
    protected $fillable = [
        'code',
        'name',
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A company may have zero or many branches.
     *
     * This function will retrieve the company of a given branch.
     * See: Company's branches() method for the inverse
     *
     * @return mixed
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
