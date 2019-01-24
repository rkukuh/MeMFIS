<?php

use App\Models\Project;
use Illuminate\Database\Seeder;

class Projects extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Project::class, config('memfis.dummies.projects'))->create();
    }
}
