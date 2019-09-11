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
            'name' => 'Beli 1 Gratis 1',
        ]);

        Promo::create([
            'code' => '2-1',
            'name' => 'Beli 2 Gratis 2',
        ]);

        Promo::create([
            'code' => 'amount-100k',
            'name' => 'Diskon 100 Ribu',
        ]);

        Promo::create([
            'code' => 'amount-250k',
            'name' => 'Diskon 250 Ribu',
        ]);

        Promo::create([
            'code' => 'amount-1m',
            'name' => 'Diskon 1 Juta',
        ]);

        Promo::create([
            'code' => 'amount-1.5m',
            'name' => 'Diskon 1,5 Juta',
        ]);

        Promo::create([
            'code' => '1-amount-500k',
            'name' => 'Beli 1 Diskon 500 Ribu',
        ]);

        Promo::create([
            'code' => '3-amount-1m',
            'name' => 'Beli 3 Diskon 1 Juta',
        ]);

        Promo::create([
            'code' => 'percent-10',
            'name' => 'Diskon 10%',
        ]);

        Promo::create([
            'code' => 'percent-20',
            'name' => 'Diskon 20%',
        ]);

        Promo::create([
            'code' => 'percent-25',
            'name' => 'Diskon 25%',
        ]);

        Promo::create([
            'code' => '1-percent-20',
            'name' => 'Beli 1 Diskon 20%',
        ]);

        Promo::create([
            'code' => '1-percent-20',
            'name' => 'Beli 1 Diskon 20%',
        ]);

        Promo::create([
            'code' => '2-percent-15',
            'name' => 'Beli 2 Diskon 15%',
        ]);
    }
}
