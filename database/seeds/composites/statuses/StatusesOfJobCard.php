<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesOfJobCard extends Seeder
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
            'of'   => 'jobcard',
        ]);

        Status::create([
            'code' => 'progress',
            'name' => 'IN-PROGRESS',
            'of'   => 'jobcard',
        ]);

        Status::create([
            'code' => 'pending',
            'name' => 'PENDING',
            'of'   => 'jobcard',
        ]);

        Status::create([
            'code' => 'paused',
            'name' => 'PAUSED',
            'of'   => 'jobcard',
        ]);

        Status::create([
            'code' => 'closed',
            'name' => 'CLOSED',
            'of'   => 'jobcard',
        ]);

        Status::create([
            'code' => 'released',
            'name' => 'RELEASED',
            'of'   => 'jobcard',
        ]);
        
        Status::create([
            'code' => 'rii-released',
            'name' => 'RII RELEASED',
            'of'   => 'jobcard',
        ]);
    }
}
