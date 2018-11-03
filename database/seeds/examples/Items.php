<?php

use App\Models\Item;
use App\Models\Category;
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
        // TODO: Model factory is not respecting model observer

        factory(Item::class, config('memfis.examples.items'))
            ->create()
            ->each(function ($item) {
                $item->categories()->attach(
                    Category::get()->random()
                );
            });;
    }
}
