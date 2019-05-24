<?php

use App\Models\Facility;
use Illuminate\Database\Seeder;
use App\Models\Pivots\ProjectWorkPackage;
use App\Models\ProjectWorkPackageFacility;

class ProjectWorkPackageFacilities extends Seeder
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

            for ($j = 1; $j <= rand(2, Facility::count()); $j++) {
                $project_workpackage->facilities()->create([
                    'facility_id' => Facility::find($j)->id,
                ]);
            }
        }
    }
}
