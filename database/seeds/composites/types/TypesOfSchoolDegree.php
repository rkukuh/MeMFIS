<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfSchoolDegree extends Seeder
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
            'of'  => 'school-degree',
        ]);

        Type::create([
            'code' => 'junior-high-school',
            'name' => 'SMP / Sederajat',
            'of'  => 'school-degree',
        ]);

        Type::create([
            'code' => 'senior-high-school',
            'name' => 'SMA',
            'of'  => 'school-degree',
        ]);

        Type::create([
            'code' => 'vocational',
            'name' => 'SMK',
            'of'  => 'school-degree',
        ]);

        Type::create([
            'code' => 'diploma',
            'name' => 'Diploma',
            'of'  => 'school-degree',
        ]);

        Type::create([
            'code' => 'bachelor',
            'name' => 'S1',
            'of'  => 'school-degree',
        ]);

        Type::create([
            'code' => 'master',
            'name' => 'S2',
            'of'  => 'school-degree',
        ]);

        Type::create([
            'code' => 'bachelor',
            'name' => 'S3',
            'of'  => 'school-degree',
        ]);
    }
}
