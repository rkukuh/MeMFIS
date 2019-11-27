<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfCoa extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'activa',
            'name' => 'ACTIVA',
            'of'   => 'coa',
        ]);

        Type::create([
            'code' => 'pasiva',
            'name' => 'PASIVA',
            'of'   => 'coa',
        ]);

        Type::create([
            'code' => 'ekuitas',
            'name' => 'EKUITAS',
            'of'   => 'coa',
        ]);

        Type::create([
            'code' => 'pendapatan',
            'name' => 'PENDAPATAN',
            'of'   => 'coa',
        ]);

        Type::create([
            'code' => 'biaya',
            'name' => 'BIAYA',
            'of'   => 'coa',
        ]);
    }
}
