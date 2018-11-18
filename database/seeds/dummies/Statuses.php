<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class Statuses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Status::class, config('memfis.dummies.statuses'))->create();
    }
}
