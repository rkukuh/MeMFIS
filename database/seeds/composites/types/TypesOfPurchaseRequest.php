<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfPurchaseRequest extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'general',
            'name' => 'General',
            'of'   => 'purchase-request',
        ]);

        Type::create([
            'code' => 'hm',
            'name' => 'Heavy Maintenance',
            'of'   => 'purchase-request',
        ]);
    }
}
