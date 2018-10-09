<?php

use App\Models\Unit;
use App\Models\Type;
use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** WEIGHT */

        Unit::create([
            'name' => 'Kilogram',
            'symbol' => 'kg',
            'type_id' => Type::ofUnit()->where('code', 'weight')->first()->id,
        ]);

        Unit::create([
            'name' => 'Ton',
            'symbol' => 'ton',
            'type_id' => Type::ofUnit()->where('code', 'weight')->first()->id,
        ]);

        /** DIMENSION */

        Unit::create([
            'name' => 'Centimeter',
            'symbol' => 'cm',
            'type_id' => Type::ofUnit()->where('code', 'dimension')->first()->id,
        ]);

        Unit::create([
            'name' => 'Meter',
            'symbol' => 'm',
            'type_id' => Type::ofUnit()->where('code', 'dimension')->first()->id,
        ]);
    }
}
