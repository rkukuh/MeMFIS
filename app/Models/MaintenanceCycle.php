<?php

namespace App\Models;

use App\MemfisModel;

class MaintenanceCycle extends MemfisModel
{
    //

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A maintenance cycle may have zero or many type.
     *
     * This function will retrieve the type of an maintenance cycle.
     * See: Type's maintenance_cycles() method for the inverse
     *
     * @return mixed
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
