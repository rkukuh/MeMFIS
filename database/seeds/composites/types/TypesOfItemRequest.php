<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfItemRequest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'tool',
            'name' => 'Tool',
            'of'   => 'item-request',
        ]);

        Type::create([
            'code' => 'material',
            'name' => 'Material',
            'of'   => 'item-request',
        ]);
    }
}
