<?php

use App\Models\Holiday;
use Illuminate\Database\Seeder;

class Holidays extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Holiday::class, config('memfis.dummies.holidays'))->create();
    }
}
