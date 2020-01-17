<?php

use App\Models\JobTitle;
use Illuminate\Database\Seeder;

class JobTitles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(JobTitle::class, config('memfis.dummies.jobtitles'))->create();
    }
}
