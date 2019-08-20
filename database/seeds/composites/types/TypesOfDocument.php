<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfDocument extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'ktp',
            'name' => 'KTP',
            'of'   => 'document',
        ]);

        Type::create([
            'code' => 'npwp',
            'name' => 'NPWP',
            'of'   => 'document',
        ]);

        Type::create([
            'code' => 'sim',
            'name' => 'Driving License (SIM)',
            'of'   => 'document',
        ]);

        Type::create([
            'code' => 'nkpk',
            'name' => 'NKPK',
            'of'   => 'document',
        ]);
    }
}
