<?php

use App\Models\Country;
use App\Models\Nationality;
use Illuminate\Database\Seeder;

class NationalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Nationality::create([
            'nationality' => 'Indonesia',
            'country_id' => Country::where('iso_2','ID')->first()->id
        ]);
    }
}
