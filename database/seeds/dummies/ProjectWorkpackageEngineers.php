<?php

use App\Models\Type;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use App\Models\Pivots\ProjectWorkPackage;
use App\Models\ProjectWorkPackageEngineer;

class ProjectWorkPackageEngineers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= ProjectWorkPackage::count(); $i++) {
            $project_workpackage = ProjectWorkPackage::find($i);

            for ($j = 1; $j <= rand(3, 5); $j++) {
                $project_workpackage->engineers()->create([
                    'skill_id' => Type::ofTaskCardSkill()->get()->random()->id,
                    'engineer_id' => Employee::get()->random()->id,
                ]);
            }
        }
    }
}
