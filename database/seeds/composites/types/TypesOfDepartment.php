<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfDepartment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'unit',
            'name' => 'Unit',
            'of'   => 'department',
        ]);
        
        Type::create([
            'code' => 'sub-unit',
            'name' => 'Sub-Unit',
            'of'   => 'department',
        ]);

        Type::create([
            'code' => 'other',
            'name' => 'Other',
            'of'   => 'department',
        ]);
    }
}
