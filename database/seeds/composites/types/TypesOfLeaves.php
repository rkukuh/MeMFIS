<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfLeaves extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'personals',
            'name' => 'Holidays',
            'of'   => 'leaves',
        ]);

        Type::create([
            'code' => 'personals',
            'name' => 'Pregnant',
            'of'   => 'leaves',
        ]);
    }
}
