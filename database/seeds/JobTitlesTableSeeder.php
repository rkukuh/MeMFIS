<?php

use App\Models\JobTitle;
use Illuminate\Database\Seeder;

class JobTitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobTitle::create([
            'code' => 'dirut',
            'name' => 'Direktu Utama',
            'description' => 'Direktur utama PT. Merpati Maintenance Facility',
            'specification' => 'Orang yang membawa perusahaan menuju kesuksesan'
        ]);

        JobTitle::create([
            'code' => 'commissioner',
            'name' => 'Commissioner',
            'description' => 'Commissioner PT. Merpati Maintenance Facility',
            'specification' => 'Orang yang membawa komisi PT.MMF'
        ]);

        JobTitle::create([
            'code' => 'staff',
            'name' => 'Staff',
            'description' => 'Staff PT. Merpati Maintenance Facility',
            'specification' => 'cuma staff'
        ]);

        JobTitle::create([
            'code' => 'mechanic',
            'name' => 'Mechanic',
            'description' => 'Mechanic PT. Merpati Maintenance Facility',
            'specification' => 'cuma mechanic'
        ]);

        JobTitle::create([
            'code' => 'engineer',
            'name' => 'Engineer',
            'description' => 'Engineer PT. Merpati Maintenance Facility',
            'specification' => 'cuma engineer'
        ]);
    }
}
