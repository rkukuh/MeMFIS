<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfJournal extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'active',
            'name' => 'Aktiva',
            'of'  => 'journal',
        ]);

        Type::create([
            'code' => 'passive',
            'name' => 'Pasiva',
            'of'   => 'journal',
        ]);

        Type::create([
            'code' => 'equity',
            'name' => 'Ekuitas',
            'of'   => 'journal',
        ]);

        Type::create([
            'code' => 'income',
            'name' => 'Pendapatan',
            'of'   => 'journal',
        ]);

        Type::create([
            'code' => 'expense',
            'name' => 'Biaya',
            'of'   => 'journal',
        ]);
    }
}
