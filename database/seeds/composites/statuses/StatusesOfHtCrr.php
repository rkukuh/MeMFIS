<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesOfHtCrr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'code' => 'open',
            'name' => 'OPEN',
            'of'   => 'htcrr',
        ]);

        Status::create([
            'code' => 'progress',
            'name' => 'IN-PROGRESS',
            'of'   => 'htcrr',
        ]);

        Status::create([
            'code' => 'pending',
            'name' => 'PENDING',
            'of'   => 'htcrr',
        ]);

        Status::create([
            'code' => 'paused',
            'name' => 'PAUSED',
            'of'   => 'htcrr',
        ]);

        Status::create([
            'code' => 'closed',
            'name' => 'CLOSED',
            'of'   => 'htcrr',
        ]);

        Status::create([
            'code' => 'released',
            'name' => 'RELEASED',
            'of'   => 'htcrr',
        ]);
        
        Status::create([
            'code' => 'rii-released',
            'name' => 'RII RELEASED',
            'of'   => 'htcrr',
        ]);
    }
}
