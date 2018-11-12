<?php

namespace App\Models;

use App\MemfisModel;
use App\Models\Pivots\EmployeeLicense;

class Amel extends MemfisModel
{
    protected $fillable = [
        'amelable_id',
        'amelable_type',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: An AMEL may have zero or many aircraft rating.
     *
     * This function will retrieve the header of an AMEL.
     * See: Employee License's amels() method for the inverse
     *
     * @return mixed
     */
    public function header()
    {
        return $this->belongsTo(EmployeeLicense::class, 'employee_license_id');
    }

    /**
     * Polymorph: An AMEL content could be aircraft and/or engine.
     *
     * This function will get all of the owning amelable models.
     * See:
     * - Aircraft's amels() method for the inverse
     * - Item's amels() method for the inverse
     *
     * @return mixed
     */
    public function amelable()
    {
        return $this->morphTo();
    }
}
