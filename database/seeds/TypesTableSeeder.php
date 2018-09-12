<?php

use PharIo\Manifest\Type;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
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
            'of'  => 'phone',
        ]);

        Type::create([
            'name' => 'Personal',
            'of'  => 'phone',
        ]);

        /** EMAIL */

        Type::create([
            'name' => 'Work',
            'of'  => 'email',
        ]);

        Type::create([
            'name' => 'Personal',
            'of'  => 'email',
        ]);

        /** FAX */

        Type::create([
            'name' => 'Work',
            'of'  => 'fax',
        ]);

        Type::create([
            'name' => 'Personal',
            'of'  => 'fax',
        ]);
    }
}
