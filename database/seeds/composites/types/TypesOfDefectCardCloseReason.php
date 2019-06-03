<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfDefectCardCloseReason extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'accomplished',
            'name' => 'Accomplished',
            'of'   => 'defectcard-close-reason',
        ]);

        Type::create([
            'code' => 'other',
            'name' => 'Other',
            'of'   => 'defectcard-close-reason',
        ]);
    }
}
