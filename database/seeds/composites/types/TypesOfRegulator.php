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
            'code' => 'dgca',
            'name' => 'DGCA',
            'of'   => 'regulator',
        ]);

        Type::create([
            'code' => 'easa',
            'name' => 'EASA',
            'of'   => 'regulator',
        ]);

        Type::create([
            'code' => 'faa',
            'name' => 'FAA',
            'of'   => 'regulator',
        ]);
    }
}
