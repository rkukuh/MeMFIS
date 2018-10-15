<?php

use Illuminate\Database\Seeder;
use App\Models\Manufacturer;

class AircraftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** BOEING */

        $boeing = Manufacturer::where('code', 'boeing')->first();

        $boeing->aircrafts()->create([
            'code' => 'B737-200',
            'name' => 'B737-200',
        ]);

        $boeing->aircrafts()->create([
            'code' => 'B737-300',
            'name' => 'B737-300',
        ]);

        $boeing->aircrafts()->create([
            'code' => 'B737-400',
            'name' => 'B737-400',
        ]);

        $boeing->aircrafts()->create([
            'code' => 'B737-500',
            'name' => 'B737-500',
        ]);

        $boeing->aircrafts()->create([
            'code' => 'B737-800NG',
            'name' => 'B737-800NG',
        ]);

        $boeing->aircrafts()->create([
            'code' => 'B737-900ER',
            'name' => 'B737-900ER',
        ]);

        /** FOKKER */

        $fokker = Manufacturer::where('code', 'fokker')->first();

        $fokker->aircrafts()->create([
            'code' => 'F-50',
            'name' => 'F-50',
        ]);

        $fokker->aircrafts()->create([
            'code' => 'F-28',
            'name' => 'F-28',
        ]);

        $fokker->aircrafts()->create([
            'code' => 'F-27-MK500',
            'name' => 'F-27-MK500',
        ]);

        $fokker->aircrafts()->create([
            'code' => 'F-27-MK50',
            'name' => 'F-27-MK50',
        ]);

        $fokker->aircrafts()->create([
            'code' => 'F-27-MK200',
            'name' => 'F-27-MK200',
        ]);

        $fokker->aircrafts()->create([
            'code' => 'F-100',
            'name' => 'F-100',
        ]);

        /** XIAN */

        $xian = Manufacturer::where('code', 'xian')->first();

        $xian->aircrafts()->create([
            'code' => 'MA-60',
            'name' => 'MA-60',
        ]);

        /** CESSNA */

        $cessna = Manufacturer::where('code', 'cessna')->first();

        $cessna->aircrafts()->create([
            'code' => 'CESSNA172',
            'name' => 'CESSNA172',
        ]);

        /** ATR */

        $atr = Manufacturer::where('code', 'atr')->first();

        $atr->aircrafts()->create([
            'code' => 'ATR-72',
            'name' => 'ATR-72',
        ]);

        $atr->aircrafts()->create([
            'code' => 'ATR-42',
            'name' => 'ATR-42',
        ]);

        /** DHC */

        $dhc = Manufacturer::where('code', 'dhc')->first();

        $dhc->aircrafts()->create([
            'code' => 'DHC-6',
            'name' => 'DHC-6',
        ]);

        /** PT. DI */

        $ptdi = Manufacturer::where('code', 'ptdi')->first();

        $ptdi->aircrafts()->create([
            'code' => 'CN-235',
            'name' => 'CN-235',
        ]);

        /** CASA */

        $casa = Manufacturer::where('code', 'casa')->first();

        $casa->aircrafts()->create([
            'code' => 'CA-212',
            'name' => 'CA-212',
        ]);
    }
}
