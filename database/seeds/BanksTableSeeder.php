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
            'abbr' => 'SINARMAS',
            'name' => 'Bank Sinarmas'
        ]);

        Bank::create([
            'abbr' => 'BCA',
            'name' => 'Bank Central Asia (BCA)'
        ]);

        Bank::create([
            'abbr' => 'MANDIRI',
            'name' => 'Bank Mandiri'
        ]);

        Bank::create([
            'abbr' => 'BNI',
            'name' => 'Bank Negara Indonesia (BNI)'
        ]);

        Bank::create([
            'abbr' => 'BRI',
            'name' => 'Bank Rakyat Indonesia (BRI)'
        ]);

        Bank::create([
            'abbr' => 'CIMB',
            'name' => 'Bank CIMB Niaga'
        ]);

        Bank::create([
            'abbr' => 'OCBC',
            'name' => 'Bank OCBC NISP'
        ]);

        Bank::create([
            'abbr' => 'DANAMON',
            'name' => 'Bank Danamon'
        ]);

        Bank::create([
            'abbr' => 'MAYBANK',
            'name' => 'Bank Maybank'
        ]);
    }
}
