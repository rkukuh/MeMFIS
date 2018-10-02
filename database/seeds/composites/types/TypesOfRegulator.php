<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfRegulator extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'name' => 'DGCA',
            'of'   => 'regulator',
        ]);

        Type::create([
            'name' => 'EASA',
            'of'   => 'regulator',
        ]);

        Type::create([
            'name' => 'FAA',
            'of'   => 'regulator',
        ]);
    }
}
