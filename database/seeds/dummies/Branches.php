<?php

use App\Models\Branch;
use Illuminate\Database\Seeder;

class Branches extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Branch::class, config('memfis.dummies.branches'))->create();
    }
}
