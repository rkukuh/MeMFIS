<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfAviationSchoolDegree extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'a1',
            'name' => 'A1 - Airframe',
            'of'  => 'aviation-school-degree',
        ]);

        Type::create([
            'code' => 'a2',
            'name' => 'A2 - Airframe',
            'of'  => 'aviation-school-degree',
        ]);

        Type::create([
            'code' => 'a3',
            'name' => 'A3 - Piston Engine',
            'of'  => 'aviation-school-degree',
        ]);

        Type::create([
            'code' => 'a4',
            'name' => 'A4 - Turbine Engine',
            'of'  => 'aviation-school-degree',
        ]);

        Type::create([
            'code' => 'c1',
            'name' => 'C1 - Radio & Electronics',
            'of'  => 'aviation-school-degree',
        ]);

        Type::create([
            'code' => 'c2',
            'name' => 'C2 - Instrument',
            'of'  => 'aviation-school-degree',
        ]);

        Type::create([
            'code' => 'c4',
            'name' => 'C4 - Electrical',
            'of'  => 'aviation-school-degree',
        ]);
    }
}
