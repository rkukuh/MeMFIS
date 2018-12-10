<?php

use App\Models\School;
use Illuminate\Database\Seeder;

class Schools extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(School::class, config('memfis.dummies.schools'))->create();
    }
}
