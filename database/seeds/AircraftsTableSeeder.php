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
    }
}
