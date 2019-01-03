<?php

namespace App\Models;

use App\MemfisModel;

class AircraftAccess extends MemfisModel
{
    protected $table = 'aircraft_accesses';

    protected $fillable = [
        'name',
        'aircraft_id',
    ];

    /*************************************** RELATIONSHIP ****************************************/

    // TODO: Define 1-M with Aircraft
}
