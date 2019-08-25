<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfPhone extends Seeder
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
            'of'   => 'phone',
        ]);

        Type::create([
            'code' => 'personal',
            'name' => 'Personal',
            'of'   => 'phone',
        ]);

        Type::create([
            'code' => 'mobile',
            'name' => 'Mobile',
            'of'   => 'phone',
        ]);

        Type::create([
            'code' => 'home',
            'name' => 'Home',
            'of'   => 'phone',
        ]);

        Type::create([
            'code' => 'other',
            'name' => 'Other',
            'of'   => 'phone',
        ]);
    }
}
