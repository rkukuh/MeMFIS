<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfJobCardLogBook extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'ac-logbook',
            'name' => 'A/C Log Book',
            'of'   => 'jobcard-logbook',
        ]);

        Type::create([
            'code' => 'eng-logbook',
            'name' => 'ENG Log Book',
            'of'   => 'jobcard-logbook',
        ]);

        Type::create([
            'code' => 'apu-logbook',
            'name' => 'APU Log Book',
            'of'   => 'jobcard-logbook',
        ]);
    }
}
