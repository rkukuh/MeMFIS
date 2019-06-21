<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesOfProject extends Seeder
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
            'of'   => 'project',
        ]);

        Status::create([
            'code' => 'progress',
            'name' => 'IN-PROGRESS',
            'of'   => 'project',
        ]);

        Status::create([
            'code' => 'pending',
            'name' => 'PENDING / PAUSE',
            'of'   => 'project',
        ]);

        Status::create([
            'code' => 'closed',
            'name' => 'CLOSED',
            'of'   => 'project',
        ]);

        Status::create([
            'code' => 'released',
            'name' => 'RELEASED',
            'of'   => 'project',
        ]);
        
        Status::create([
            'code' => 'rii-released',
            'name' => 'RII RELEASED',
            'of'   => 'project',
        ]);
    }
}
