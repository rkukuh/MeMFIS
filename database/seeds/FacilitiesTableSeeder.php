<?php

use App\Models\Facility;
use Illuminate\Database\Seeder;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Facility::create([
            'code' => 'line1',
            'name' => 'Hanggar line 1',
        ]);

        Facility::create([
            'code' => 'line2',
            'name' => 'Hanggar line 2',
        ]);

        Facility::create([
            'code' => 'line3',
            'name' => 'Hanggar line 3',
        ]);

        Facility::create([
            'code' => 'line4',
            'name' => 'Hanggar line 4',
        ]);

        Facility::create([
            'code' => 'line5',
            'name' => 'Hanggar line 5',
        ]);

    }
}
