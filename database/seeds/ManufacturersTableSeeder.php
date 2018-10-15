<?php

use App\Models\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manufacturer::create([
            'code' => 'boeing',
            'name' => 'Boeing'
        ]);

        Manufacturer::create([
            'code' => 'airbus',
            'name' => 'Airbus'
        ]);

        Manufacturer::create([
            'code' => 'fokker',
            'name' => 'Fokker'
        ]);

        Manufacturer::create([
            'code' => 'sukhoi',
            'name' => 'Sukhoi'
        ]);

        Manufacturer::create([
            'code' => 'cessna',
            'name' => 'Cessna'
        ]);

        Manufacturer::create([
            'code' => 'xian',
            'name' => 'Xian'
        ]);

        Manufacturer::create([
            'code' => 'caravan',
            'name' => 'Caravan'
        ]);
    }
}
