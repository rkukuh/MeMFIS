<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfJobCardPauseReason extends Seeder
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
            'of'   => 'jobcard-pause-reason',
        ]);

        Type::create([
            'code' => 'waiting-material',
            'name' => 'Waiting for Material',
            'of'   => 'jobcard-pause-reason',
        ]);

        Type::create([
            'code' => 'other',
            'name' => 'Other',
            'of'   => 'jobcard-pause-reason',
        ]);
    }
}
