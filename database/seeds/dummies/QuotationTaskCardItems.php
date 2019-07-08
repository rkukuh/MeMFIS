<?php

use App\Models\Unit;
use App\Models\Item;
use App\Models\Price;
use Illuminate\Database\Seeder;
use App\Models\QuotationTaskCardItem;
use App\Models\Pivots\QuotationTaskCard;

class QuotationTaskCardItems extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= QuotationTaskCard::count() / 10; $i++) {
            $quotation_taskcard = QuotationTaskCard::find($i);

            for ($j = 1; $j <= rand(2, Item::count()); $j++) {
                $item_prices = Price::where('priceable_type', 'App\Models\Item')->get();

                $quotation_taskcard->items()->create([
                    'item_id' => Item::find($j)->id,
                    'quantity' => rand(1, 10),
                    'unit_id' => Unit::get()->random()->id,
                    'price_id' => $faker->randomElement([$item_prices->random()->id]),
                    'price_amount' => $faker->randomElement([rand(10, 100) * 1000000]),
                    'note' => $faker->randomElement([null, $faker->text]),
                ]);
            }
        }
    }
}
