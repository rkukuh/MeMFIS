<?php

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Bank::class)->create([
            'code' => 'mandiri',
            'name' => 'Bank Mandiri',
        ]);

        factory(Bank::class)->create([
            'code' => 'bni',
            'name' => 'Bank BNI',
        ]);

        factory(Bank::class)->create([
            'code' => 'bri',
            'name' => 'Bank BRI',
        ]);

        factory(Bank::class)->create([
            'code' => 'btn',
            'name' => 'Bank BTN',
        ]);

        factory(Bank::class)->create([
            'code' => 'bca',
            'name' => 'Bank BCA',
        ]);

        factory(Bank::class)->create([
            'code' => 'cimb',
            'name' => 'Bank CIMB Niaga',
        ]);

        factory(Bank::class)->create([
            'code' => 'btpn',
            'name' => 'Bank BTPN',
        ]);

        factory(Bank::class)->create([
            'code' => 'danamon',
            'name' => 'Bank Danamon',
        ]);

        factory(Bank::class)->create([
            'code' => 'mega',
            'name' => 'Bank Mega',
        ]);

        factory(Bank::class)->create([
            'code' => 'muamalat',
            'name' => 'Bank Muamalat',
        ]);
    }
}
