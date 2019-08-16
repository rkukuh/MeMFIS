<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfFax extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'company',
            'name' => 'Company',
            'of'   => 'fax',
        ]);

        Type::create([
            'code' => 'personal',
            'name' => 'Personal',
            'of'   => 'fax',
        ]);
    }
}
