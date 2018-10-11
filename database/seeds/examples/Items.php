<?php

use App\Models\Item;
use Illuminate\Database\Seeder;

class Items extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', '-1');

        factory(Item::class, config('memfis.examples.items'))->create();
    }
}
