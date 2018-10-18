<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfAviationDegree extends Seeder
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
            'name' => 'A1',
            'description' => 'Airframe Airplane / Fixed Wing',
            'of' => 'aviation-degree',
        ]);

        Type::create([
            'code' => 'a2',
            'name' => 'A2',
            'description' => 'Airframe Helicopter / Rotary Wing',
            'of' => 'aviation-degree',
        ]);

        Type::create([
            'code' => 'a3',
            'name' => 'A3',
            'description' => 'Piston Engine',
            'of' => 'aviation-degree',
        ]);

        Type::create([
            'code' => 'a4',
            'name' => 'A4',
            'description' => 'Turbine Engine',
            'of' => 'aviation-degree',
        ]);

        Type::create([
            'code' => 'c1',
            'name' => 'C1',
            'description' => 'Radio & Electronics',
            'of' => 'aviation-degree',
        ]);

        Type::create([
            'code' => 'c2',
            'name' => 'C2',
            'description' => 'Instrument',
            'of' => 'aviation-degree',
        ]);

        Type::create([
            'code' => 'c4',
            'name' => 'C4',
            'description' => 'Electrical',
            'of' => 'aviation-degree',
        ]);
    }
}
