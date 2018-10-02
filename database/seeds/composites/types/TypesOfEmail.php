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
            'name' => 'Work',
            'of'   => 'email',
        ]);

        Type::create([
            'name' => 'Personal',
            'of'   => 'email',
        ]);
    }
}
