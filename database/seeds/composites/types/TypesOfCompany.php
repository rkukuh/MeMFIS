<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfCompany extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'ho',
            'name' => 'Head Office',
            'of'   => 'company',
        ]);

        Type::create([
            'code' => 'bo',
            'name' => 'Branch Office',
            'of'   => 'company',
        ]);

        Type::create([
            'code' => 'company',
            'name' => 'Company',
            'of'   => 'company',
        ]);

        Type::create([
            'code' => 'department',
            'name' => 'Department',
            'of'   => 'company',
        ]);

        Type::create([
            'code' => 'regional office',
            'name' => 'Regional Office',
            'of'   => 'company',
        ]);

        Type::create([
            'code' => 'unit',
            'name' => 'Unit',
            'of'   => 'company',
        ]);

        Type::create([
            'code' => 'sub unit',
            'name' => 'Sub Unit',
            'of'   => 'company',
        ]);

        Type::create([
            'code' => 'other',
            'name' => 'Others',
            'of'   => 'company',
        ]);
    }
}
