<?php

use App\Models\InventoryIn;
use Illuminate\Database\Seeder;

class InventoryIns extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(InventoryIn::class, config('memfis.dummies.inventory_ins'))->create();
    }
}
