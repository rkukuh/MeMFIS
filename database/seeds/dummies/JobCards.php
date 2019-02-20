<?php

use App\Models\JobCard;
use Illuminate\Database\Seeder;

class JobCards extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(JobCard::class, config('memfis.dummies.jobcards'))->create();
    }
}
