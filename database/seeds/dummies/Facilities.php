<?php

use App\Models\Facility;
use Illuminate\Database\Seeder;

class Facilities extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Facility::class, config('memfis.dummies.facilities'))->create();
    }
}
