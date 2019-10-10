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
            'code' => 'spk',
            'name' => 'Surat Perintah Kerja',
            'of'   => 'employment',
        ]);

        Status::create([
            'code' => 'outsource',
            'name' => 'Outsource',
            'of'   => 'employment',
        ]);

        Status::create([
            'code' => 'pkwt',
            'name' => 'Perjanjian Kerja Waktu Tertentu',
            'of'   => 'employment',
        ]);

        Status::create([
            'code' => 'permanent',
            'name' => 'Permanent',
            'of'   => 'employment',
        ]);

        Status::create([
            'code' => 'part-time',
            'name' => 'Part Time',
            'of'   => 'employment',
        ]);

        Status::create([
            'code' => 'full-time',
            'name' => 'Full Time',
            'of'   => 'employment',
        ]);

        Status::create([
            'code' => 'internship',
            'name' => 'Magang',
            'of'   => 'employment',
        ]);

        Status::create([
            'code' => 'freelance',
            'name' => 'Freelance',
            'of'   => 'employment',
        ]);
    }
}
