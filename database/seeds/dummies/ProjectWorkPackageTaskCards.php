<?php

use App\Models\TaskCard;
use Illuminate\Database\Seeder;
use App\Models\Pivots\ProjectWorkPackage;
use App\Models\ProjectWorkPackageTaskCard;

class ProjectWorkPackageTaskCards extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= ProjectWorkPackage::count(); $i++) {
            $project_workpackage = ProjectWorkPackage::find($i);

            for ($j = 1; $j <= rand(2, TaskCard::count()); $j++) {
                $project_workpackage->taskcards()->create([
                    'taskcard_id' => TaskCard::find($j)->id,
                    'sequence' => $j,
                    'is_mandatory' => $faker->boolean,
                    'note' => $faker->randomElement([null, $faker->text]),
                ]);
            }
        }
    }
}
