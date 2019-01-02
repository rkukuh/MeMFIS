<?php

namespace App\Models;

use App\MemfisModel;

class AircraftZone extends MemfisModel
{
    protected $table = 'aircraft_zones';

    protected $fillable = [
        'name',
        'aircraft_id',
    ];

    // TODO: Define 1-M with Aircraft
}
