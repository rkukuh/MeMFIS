<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfUnit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'weight',
            'name' => 'Weight',
            'of'   => 'unit',
        ]);

        Type::create([
            'code' => 'dimension',
            'name' => 'Dimension',
            'of'   => 'unit',
        ]);
    }
}
