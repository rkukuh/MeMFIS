<?php

use App\Models\License;
use Illuminate\Database\Seeder;

class Licenses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(License::class, config('memfis.dummies.licenses'))->create();
    }
}
