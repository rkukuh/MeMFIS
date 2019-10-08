<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesOfOvertime extends Seeder
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
            'of'   => 'overtime',
        ]);

        Status::create([
            'code' => 'approved',
            'name' => 'APPROVED',
            'of'   => 'overtime',
        ]);

        Status::create([
            'code' => 'rejected',
            'name' => 'REJECTED',
            'of'   => 'overtime',
        ]);
    }
}
