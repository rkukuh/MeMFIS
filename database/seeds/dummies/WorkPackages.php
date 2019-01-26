<?php

use App\Models\WorkPackage;
use Illuminate\Database\Seeder;

class WorkPackages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(WorkPackage::class, config('memfis.dummies.workpackages'))->create();
    }
}
