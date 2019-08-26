<?php

use App\Models\EOInstruction;
use Illuminate\Database\Seeder;
use App\Models\Pivots\ProjectWorkPackage;
use App\Models\ProjectWorkPackageEOInstruction;

class ProjectWorkPackageEOInstructions extends Seeder
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

            for ($j = 1; $j <= rand(2, EOInstruction::count()); $j++) {
                $project_workpackage->eo_instructions()->create([
                    'eo_instruction_id' => EOInstruction::find($j)->id,
                    'sequence' => $j,
                    'is_rii' => $faker->boolean,
                    'is_mandatory' => $faker->boolean,
                    'note' => $faker->randomElement([null, $faker->text]),
                ]);
            }
        }
    }
}
