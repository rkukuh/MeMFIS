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
            'of'   => 'job-card',
        ]);

        Status::create([
            'code' => 'progress',
            'name' => 'IN-PROGRESS',
            'of'   => 'job-card',
        ]);

        Status::create([
            'code' => 'pending',
            'name' => 'PENDING',
            'of'   => 'job-card',
        ]);

        Status::create([
            'code' => 'paused',
            'name' => 'PAUSED',
            'of'   => 'job-card',
        ]);

        Status::create([
            'code' => 'closed',
            'name' => 'CLOSED',
            'of'   => 'job-card',
        ]);
    }
}
