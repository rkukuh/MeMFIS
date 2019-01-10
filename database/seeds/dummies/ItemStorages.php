<?php

use App\Models\Item;
use App\Models\Storage;
use Illuminate\Database\Seeder;

class ItemStorages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = Item::all();

        foreach ($items as $item) {
            for ($i = 1; $i <= rand(1, 5); $i++) {
                $storage = Storage::get()->random();

                $item->storages()->attach($storage, [
                    'min' => rand(0, 1),
                    'max' => rand(1, 9) * 1000
                ]);
            }
        }
    }
}
