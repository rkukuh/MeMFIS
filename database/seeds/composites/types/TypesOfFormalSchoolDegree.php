<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfFormalSchoolDegree extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'elementary',
            'name' => 'SD',
            'of'  => 'formal-school-degree',
        ]);

        Type::create([
            'code' => 'junior-high-school',
            'name' => 'SMP / Sederajat',
            'of'  => 'formal-school-degree',
        ]);

        Type::create([
            'code' => 'senior-high-school',
            'name' => 'SMA',
            'of'  => 'formal-school-degree',
        ]);

        Type::create([
            'code' => 'vocational',
            'name' => 'SMK',
            'of'  => 'formal-school-degree',
        ]);

        Type::create([
            'code' => 'diploma',
            'name' => 'Diplomag',
            'of'  => 'formal-school-degree',
        ]);

        Type::create([
            'code' => 'bachelor',
            'name' => 'S1',
            'of'  => 'formal-school-degree',
        ]);

        Type::create([
            'code' => 'master',
            'name' => 'S2',
            'of'  => 'formal-school-degree',
        ]);

        Type::create([
            'code' => 'bachelor',
            'name' => 'S3',
            'of'  => 'formal-school-degree',
        ]);
    }
}
