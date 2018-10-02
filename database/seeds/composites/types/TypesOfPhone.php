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
        /** PHONE */

        Type::create([
            'name' => 'Work',
            'of'   => 'phone',
        ]);

        Type::create([
            'name' => 'Personal',
            'of'   => 'phone',
        ]);
    }
}
