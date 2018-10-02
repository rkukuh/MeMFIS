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
            'name' => 'Aktiva',
            'of'  => 'journal',
        ]);

        Type::create([
            'name' => 'Pasiva',
            'of'   => 'journal',
        ]);

        Type::create([
            'name' => 'Ekuitas',
            'of'   => 'journal',
        ]);

        Type::create([
            'name' => 'Pendapatan',
            'of'   => 'journal',
        ]);

        Type::create([
            'name' => 'Biaya',
            'of'   => 'journal',
        ]);
    }
}
