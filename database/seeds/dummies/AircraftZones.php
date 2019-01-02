<?php

use App\Models\AircraftZone;
use Illuminate\Database\Seeder;

class AircraftZones extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AircraftZone::class, config('memfis.dummies.aircraft_zones'))->create();
    }
}
