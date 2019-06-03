<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfDefectCardPauseReason extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'break-time',
            'name' => 'Break Time / Rest Time',
            'of'   => 'defectcard-pause-reason',
        ]);

        Type::create([
            'code' => 'waiting-material',
            'name' => 'Waiting for Material',
            'of'   => 'defectcard-pause-reason',
        ]);

        Type::create([
            'code' => 'other',
            'name' => 'Other',
            'of'   => 'defectcard-pause-reason',
        ]);
    }
}
