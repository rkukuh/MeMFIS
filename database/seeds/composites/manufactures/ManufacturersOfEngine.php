<?php

use App\Models\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturersOfEngine extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manufacturer::create([
            'code' => 'ge',
            'name' => 'General Electric'
        ]);

        Manufacturer::create([
            'code' => 'pratt',
            'name' => 'Pratt & Whitney'
        ]);

        Manufacturer::create([
            'code' => 'rr',
            'name' => 'Rolls Royce'
        ]);

        Manufacturer::create([
            'code' => 'honeywell',
            'name' => 'Honeywell'
        ]);

        Manufacturer::create([
            'code' => 'hartzell',
            'name' => 'Hartzell'
        ]);

        Manufacturer::create([
            'code' => 'dowty',
            'name' => 'Dowty'
        ]);

        Manufacturer::create([
            'code' => 'hamilton',
            'name' => 'Hamilton Sunstrand'
        ]);
    }
}
