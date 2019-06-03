<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfDefectCardProposeCorrection extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'remove',
            'name' => 'Remove',
            'of'   => 'defectcard-propose-correction',
        ]);

        Type::create([
            'code' => 'install',
            'name' => 'Install',
            'of'   => 'defectcard-propose-correction',
        ]);

        Type::create([
            'code' => 'rectification',
            'name' => 'Rectification',
            'of'   => 'defectcard-propose-correction',
        ]);

        Type::create([
            'code' => 'repair',
            'name' => 'Repair',
            'of'   => 'defectcard-propose-correction',
        ]);

        Type::create([
            'code' => 'replace',
            'name' => 'Replace',
            'of'   => 'defectcard-propose-correction',
        ]);

        Type::create([
            'code' => 'ndt',
            'name' => 'NDT',
            'of'   => 'defectcard-propose-correction',
        ]);

        Type::create([
            'code' => 'test',
            'name' => 'Test',
            'of'   => 'defectcard-propose-correction',
        ]);

        Type::create([
            'code' => 'shop-visit',
            'name' => 'Shop Visit',
            'of'   => 'defectcard-propose-correction',
        ]);

        Type::create([
            'code' => 'other',
            'name' => 'Other',
            'of'   => 'defectcard-propose-correction',
        ]);
    }
}
