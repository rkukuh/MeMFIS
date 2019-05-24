<?php

use App\Models\Type;
use Illuminate\Database\Seeder;
use App\Models\Pivots\ProjectWorkPackage;
use App\Models\ProjectWorkPackageManhour;

class ProjectWorkPackageManhours extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 1; $i <= ProjectWorkPackage::count(); $i++) {
            $project_workpackage = ProjectWorkPackage::find($i);

            for ($j = 1; $j <= rand(3, 5); $j++) {
                $project_workpackage->manhours()->create([
                    'engineer_type_id' => Type::ofProjectWorkPackageManhour()->get()->random()->id,
                    'proportion_amount' => $faker->numberBetween(10, 20),
                ]);
            }
        }
    }
}
