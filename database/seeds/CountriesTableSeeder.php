<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => 'Indonesia',
            'iso_2' => 'ID',
            'iso_3' => 'IDN',
            'phone_code' => '+62'
        ]);
    }
}
