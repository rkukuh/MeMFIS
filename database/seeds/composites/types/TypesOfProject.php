<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfProject extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'hm',
            'name' => 'Heavy Maintenance',
            'of'   => 'project',
        ]);

        Type::create([
            'code' => 'workshop',
            'name' => 'Workshop',
            'of'   => 'project',
        ]);
    }
}
