<?php

use App\Models\Item;
use App\Models\Unit;
use Illuminate\Database\Seeder;

class ItemUnit extends Seeder
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
            for ($i = 1; $i <= rand(1, 3); $i++) {
                $unit = Unit::get()->random();

                $item->units()->attach($unit, [
                    'quantity' => rand(1, 10)
                ]);
            }
        }
    }
}
