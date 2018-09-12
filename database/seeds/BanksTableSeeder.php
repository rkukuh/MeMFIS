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
        Bank::create([
            'code' => 'SINARMAS',
            'name' => 'Bank Sinarmas'
        ]);

        Bank::create([
            'code' => 'BCA',
            'name' => 'Bank Central Asia (BCA)'
        ]);

        Bank::create([
            'code' => 'MANDIRI',
            'name' => 'Bank Mandiri'
        ]);

        Bank::create([
            'code' => 'BNI',
            'name' => 'Bank Negara Indonesia (BNI)'
        ]);

        Bank::create([
            'code' => 'BRI',
            'name' => 'Bank Rakyat Indonesia (BRI)'
        ]);

        Bank::create([
            'code' => 'CIMB',
            'name' => 'Bank CIMB Niaga'
        ]);

        Bank::create([
            'code' => 'OCBC',
            'name' => 'Bank OCBC NISP'
        ]);

        Bank::create([
            'code' => 'DANAMON',
            'name' => 'Bank Danamon'
        ]);

        Bank::create([
            'code' => 'MAYBANK',
            'name' => 'Bank Maybank'
        ]);
    }
}
