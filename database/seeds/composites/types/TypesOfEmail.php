<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfEmail extends Seeder
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
            'of'   => 'email',
        ]);

        Type::create([
            'code' => 'personal',
            'name' => 'Personal',
            'of'   => 'email',
        ]);
    }
}
