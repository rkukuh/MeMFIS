<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfTax extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'include',
            'name' => 'Include',
            'of'  => 'tax',
        ]);

        Type::create([
            'code' => 'exclude',
            'name' => 'Exclude',
            'of'  => 'tax',
        ]);

        Type::create([
            'code' => 'none',
            'name' => 'No Taxation',
            'of'  => 'tax',
        ]);

    }
}
