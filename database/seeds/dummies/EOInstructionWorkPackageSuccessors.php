<?php

use App\Models\EOInstruction;
use Illuminate\Database\Seeder;
use App\Models\Pivots\EOInstructionWorkPackage;
use App\Models\EOInstructionWorkPackageSuccessor;

class EOInstructionWorkPackageSuccessors extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= (EOInstructionWorkPackage::count() / 10); $i++) {
            $eo_instruction_workpackage = EOInstructionWorkPackage::find($i);

            for ($j = 1; $j <= rand(1, 5); $j++) {
                $eo_instruction_workpackage->successors()->create([
                    'next' => EOInstruction::get()->random()->id,
                    'order' => $j,
                ]);
            }
        }
    }
}
