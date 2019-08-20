<?php

use App\Models\JobTittle;
use Illuminate\Database\Seeder;

class JobTittles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(JobTittle::class, config('memfis.dummies.jobtittles'))->create();
    }
}
