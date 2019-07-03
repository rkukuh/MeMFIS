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
            'code' => 'removal-open',
            'name' => 'OPEN',
            'of'   => 'htcrr',
        ]);

        Status::create([
            'code' => 'removal-progress',
            'name' => 'IN-PROGRESS',
            'of'   => 'htcrr',
        ]);

        Status::create([
            'code' => 'removal-pending',
            'name' => 'PENDING / PAUSE',
            'of'   => 'htcrr',
        ]);

        Status::create([
            'code' => 'removal-closed',
            'name' => 'CLOSED',
            'of'   => 'htcrr',
        ]);

        Status::create([
            'code' => 'installation-open',
            'name' => 'OPEN',
            'of'   => 'htcrr',
        ]);

        Status::create([
            'code' => 'installation-progress',
            'name' => 'IN-PROGRESS',
            'of'   => 'htcrr',
        ]);

        Status::create([
            'code' => 'installation-pending',
            'name' => 'PENDING / PAUSE',
            'of'   => 'htcrr',
        ]);

        Status::create([
            'code' => 'installation-closed',
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
