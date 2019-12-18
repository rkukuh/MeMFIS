<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesOfLeave extends Seeder
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
            'name' => 'Open',
            'of'   => 'leave',
        ]);

        Status::create([
            'code' => 'approved',
            'name' => 'Approved',
            'of'   => 'leave',
        ]);

        Status::create([
            'code' => 'rejected',
            'name' => 'Rejected',
            'of'   => 'leave',
        ]);

        Status::create([
            'code' => 'void',
            'name' => 'Void',
            'of'   => 'leave',
        ]);
    }
}
