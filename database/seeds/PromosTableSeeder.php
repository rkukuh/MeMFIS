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
            'code' => '1-free-1',
            'name' => 'Buy 1 Free 1',
        ]);

        Promo::create([
            'code' => '2-1',
            'name' => 'Buy 2 Free 2',
        ]);

        Promo::create([
            'code' => 'amount-100k',
            'name' => 'Discount 100.000',
        ]);

        Promo::create([
            'code' => 'amount-250k',
            'name' => 'Discount 250.000',
        ]);

        Promo::create([
            'code' => 'amount-1m',
            'name' => 'Discount 1.000.000',
        ]);

        Promo::create([
            'code' => 'amount-1.5m',
            'name' => 'Discount 1.500.000',
        ]);

        Promo::create([
            'code' => '1-amount-500k',
            'name' => 'Buy 1 Discount 500.000',
        ]);

        Promo::create([
            'code' => '3-amount-1m',
            'name' => 'Buy 3 Discount 1.000.000',
        ]);

        Promo::create([
            'code' => 'percent-10',
            'name' => 'Discount 10%',
        ]);

        Promo::create([
            'code' => 'percent-20',
            'name' => 'Discount 20%',
        ]);

        Promo::create([
            'code' => 'percent-25',
            'name' => 'Discount 25%',
        ]);

        Promo::create([
            'code' => '1-percent-20',
            'name' => 'Buy 1 Discount 20%',
        ]);

        Promo::create([
            'code' => '1-percent-20',
            'name' => 'Buy 1 Discount 20%',
        ]);

        Promo::create([
            'code' => '2-percent-15',
            'name' => 'Buy 2 Discount 15%',
        ]);
    }
}
