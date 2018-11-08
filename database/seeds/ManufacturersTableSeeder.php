<?php

use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ManufacturersOfAircraft::class);
        $this->call(ManufacturersOfEngine::class);
    }
}
