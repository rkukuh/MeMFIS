<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesOfEmployment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name' => 'Part-Time',
            'of'   => 'employment',
        ]);

        Status::create([
            'name' => 'Full-Time',
            'of'   => 'employment',
        ]);

        Status::create([
            'name' => 'Internship (Magang)',
            'of'   => 'employment',
        ]);

        Status::create([
            'name' => 'Remote / Freelance',
            'of'   => 'employment',
        ]);
    }
}
