<?php

use App\Models\InventoryOut;
use Illuminate\Database\Seeder;

class InventoryOuts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(InventoryOut::class, config('memfis.dummies.inventory_outs'))->create();
    }
}
