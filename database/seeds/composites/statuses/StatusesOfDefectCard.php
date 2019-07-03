<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesOfDefectCard extends Seeder
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
            'of'   => 'defectcard',
        ]);

        Status::create([
            'code' => 'progress',
            'name' => 'IN-PROGRESS',
            'of'   => 'defectcard',
        ]);

        Status::create([
            'code' => 'pending',
            'name' => 'PENDING / PAUSE',
            'of'   => 'defectcard',
        ]);

        Status::create([
            'code' => 'closed',
            'name' => 'CLOSED',
            'of'   => 'defectcard',
        ]);

        Status::create([
            'code' => 'released',
            'name' => 'RELEASED',
            'of'   => 'defectcard',
        ]);
        
        Status::create([
            'code' => 'rii-released',
            'name' => 'RII RELEASED',
            'of'   => 'defectcard',
        ]);
    }
}
