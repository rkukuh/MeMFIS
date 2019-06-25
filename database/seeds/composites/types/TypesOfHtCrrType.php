<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfHtCrrType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'parent',
            'name' => 'Parent',
            'of'   => 'htcrr-type',
        ]);

        Type::create([
            'code' => 'removal',
            'name' => 'Removal',
            'of'   => 'htcrr-type',
        ]);

        Type::create([
            'code' => 'installation',
            'name' => 'Installation',
            'of'   => 'htcrr-type',
        ]);
    }
}
