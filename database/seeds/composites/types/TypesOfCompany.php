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
    }
}
