<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfCoaTransaction extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'inventory',
            'name' => 'Inventory',
            'of'   => 'coa-transaction',
        ]);

        Type::create([
            'code' => 'cogs',
            'name' => 'COGS',
            'of'   => 'coa-transaction',
        ]);

    }
}
