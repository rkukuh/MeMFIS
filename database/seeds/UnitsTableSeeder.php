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

        Unit::create([
            'name' => 'Inch',
            'symbol' => 'in',
            'type_id' => Type::ofUnit()->where('code', 'dimension')->first()->id,
        ]);

        /** QUANTITY */

        Unit::create([
            'name' => 'Each',
            'symbol' => 'ea',
            'type_id' => Type::ofUnit()->where('code', 'quantity')->first()->id,
        ]);

        Unit::create([
            'name' => 'Unit',
            'symbol' => 'unt',
            'type_id' => Type::ofUnit()->where('code', 'quantity')->first()->id,
        ]);

        Unit::create([
            'name' => 'Box',
            'symbol' => 'box',
            'type_id' => Type::ofUnit()->where('code', 'quantity')->first()->id,
        ]);

        Unit::create([
            'name' => 'Roll',
            'symbol' => 'roll',
            'type_id' => Type::ofUnit()->where('code', 'quantity')->first()->id,
        ]);

        Unit::create([
            'name' => 'Dozen',
            'symbol' => 'dz',
            'type_id' => Type::ofUnit()->where('code', 'quantity')->first()->id,
        ]);

        Unit::create([
            'name' => 'Sheet',
            'symbol' => 'sheet',
            'type_id' => Type::ofUnit()->where('code', 'quantity')->first()->id,
        ]);

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

        Unit::create([
            'name' => 'Liter',
            'symbol' => 'lt',
            'type_id' => Type::ofUnit()->where('code', 'weight')->first()->id,
        ]);
    }
}
