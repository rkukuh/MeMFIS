<?php

namespace App\Models;

use App\MemfisModel;

class WorkPackage extends MemfisModel
{
    protected $table = 'workpackages';

    protected $fillable = [
        'code',
        'title',
        'is_template',
        'description',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A workpackage must have an aircraft
     *
     * This function will retrieve the aircraft of a workpackage.
     * See: Aircraft's workpackages() method for the inverse
     *
     * @return mixed
     */
    public function aircraft()
    {
        return $this->belongsTo(Aircraft::class);
    }
}
