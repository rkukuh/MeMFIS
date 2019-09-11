<?php

use App\Models\Promo;
use Illuminate\Database\Seeder;

class PromosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Promo::create([
            'code' => 'free',
            'name' => 'Free',
        ]);

        Promo::create([
            'code' => 'discount-percent',
            'name' => 'Discount by Percentage',
        ]);

        Promo::create([
            'code' => 'discount-amount',
            'name' => 'Discount by Amount',
        ]);
    }
}
