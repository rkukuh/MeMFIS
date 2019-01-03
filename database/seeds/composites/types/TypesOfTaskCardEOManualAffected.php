<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfTaskCardEOManualAffected extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'mm',
            'name' => 'MM',
            'of'  => 'taskcard-eo-manual-affected',
        ]);

        Type::create([
            'code' => 'ipc',
            'name' => 'IPC',
            'of'  => 'taskcard-eo-manual-affected',
        ]);

        Type::create([
            'code' => 'wdm',
            'name' => 'WDM',
            'of'  => 'taskcard-eo-manual-affected',
        ]);

        Type::create([
            'code' => 'ohm',
            'name' => 'OHM',
            'of'  => 'taskcard-eo-manual-affected',
        ]);

        Type::create([
            'code' => 'other',
            'name' => 'Other',
            'of'  => 'taskcard-eo-manual-affected',
        ]);
    }
}
