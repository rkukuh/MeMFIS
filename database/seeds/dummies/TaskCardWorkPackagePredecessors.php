<?php

use App\Models\TaskCard;
use Illuminate\Database\Seeder;
use App\Models\Pivots\TaskCardWorkPackage;
use App\Models\TaskCardWorkPackagePredecessor;

class TaskCardWorkPackagePredecessors extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= TaskCardWorkPackage::count(); $i++) {
            $taskcard_workpackage = TaskCardWorkPackage::find($i);

            for ($j = 1; $j <= rand(1, 5); $j++) {
                $taskcard_workpackage->predecessors()->create([
                    'previous' => TaskCard::get()->random()->id,
                    'order' => $j,
                ]);
            }
        }
    }
}
