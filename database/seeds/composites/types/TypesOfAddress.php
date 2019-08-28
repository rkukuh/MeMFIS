<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfAddress extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'personal',
            'name' => 'Personal',
            'of'   => 'address',
        ]);

        Type::create([
            'code' => 'company',
            'name' => 'Company',
            'of'   => 'address',
        ]);

        Type::create([
            'code' => 'billing',
            'name' => 'Billing',
            'of'   => 'address',
        ]);

        Type::create([
            'code' => 'shipping',
            'name' => 'Shipping',
            'of'   => 'address',
        ]);

        Type::create([
            'code' => 'address_1',
            'name' => 'Address 1',
            'of'   => 'address',
        ]);

        Type::create([
            'code' => 'address_2',
            'name' => 'Address 2',
            'of'   => 'address',
        ]);
    }
}
