<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfAPERI extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'airframe',
            'name' => 'Airframe',
            'of'   => 'aperi',
        ]);

        Type::create([
            'code' => 'powerplant',
            'name' => 'Powerplant / Engine',
            'of'   => 'aperi',
        ]);

        Type::create([
            'code' => 'electrical',
            'name' => 'Electrical',
            'of'   => 'aperi',
        ]);

        Type::create([
            'code' => 'radio',
            'name' => 'Radio',
            'of'   => 'aperi',
        ]);

        Type::create([
            'code' => 'instrument',
            'name' => 'Instrument',
            'of'   => 'aperi',
        ]);
    }
}
