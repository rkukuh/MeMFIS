<?php

use App\Models\Journal;
use Illuminate\Database\Seeder;

class Journals extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Journal::class, config('memfis.dummies.journals'))->create();
    }
}
