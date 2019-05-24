<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfProjectWorkPackageManhour extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'inspector',
            'name' => 'Inspector',
            'of'   => 'project-workpackage-manhour',
        ]);

        Type::create([
            'code' => 'engineer',
            'name' => 'Engineer',
            'of'   => 'project-workpackage-manhour',
        ]);

        Type::create([
            'code' => 'mechanic',
            'name' => 'Mechanic',
            'of'   => 'project-workpackage-manhour',
        ]);

        Type::create([
            'code' => 'supporting',
            'name' => 'Supporting',
            'of'   => 'project-workpackage-manhour',
        ]);
    }
}
