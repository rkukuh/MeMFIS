<?php

use App\Models\Item;
use Spatie\Tags\Tag;
use App\Models\Journal;
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

                /** Category */

                // The business said that an item has only 1 or 0 category
                $item->categories()->attach(
                    Category::get()->random()
                );

                /** Journal (Account Code) */

                for ($i = 1; $i <= rand(0, 1); $i++) {
                    $item->journal()->associate(
                        Journal::get()->random()
                    )
                    ->save();
                }

                /** Tag */

                $tags = Tag::getWithType('item');

                for ($i = 1; $i <= rand(0, $tags->count()); $i++) {
                    $item->tags()->attach($tags->find($i));
                }
            });
    }
}
