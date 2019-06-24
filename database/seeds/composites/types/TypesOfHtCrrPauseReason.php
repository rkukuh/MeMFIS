<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfHtCrrPauseReason extends Seeder
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
            'of'   => 'htcrr-pause-reason',
        ]);

        Type::create([
            'code' => 'waiting-material',
            'name' => 'Waiting for Material',
            'of'   => 'htcrr-pause-reason',
        ]);

        Type::create([
            'code' => 'other',
            'name' => 'Other',
            'of'   => 'htcrr-pause-reason',
        ]);
    }
}
