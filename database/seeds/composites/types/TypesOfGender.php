<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfGender extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'male',
            'name' => 'Male',
            'of'   => 'gender',
        ]);

        Type::create([
            'code' => 'female',
            'name' => 'Female',
            'of'   => 'gender',
        ]);
    }
}
