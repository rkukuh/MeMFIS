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
            'name' => 'Work',
            'of'   => 'fax',
        ]);

        Type::create([
            'name' => 'Personal',
            'of'   => 'fax',
        ]);
    }
}
