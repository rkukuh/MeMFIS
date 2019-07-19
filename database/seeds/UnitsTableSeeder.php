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
            'name' => 'Centimeter Square',
            'symbol' => 'cm2',
            'type_id' => Type::ofUnit()->where('code', 'dimension')->first()->id,
        ]);

        Unit::create([
            'name' => 'Meter',
            'symbol' => 'm',
            'type_id' => Type::ofUnit()->where('code', 'dimension')->first()->id,
        ]);

        Unit::create([
            'name' => 'Meter Square',
            'symbol' => 'm2',
            'type_id' => Type::ofUnit()->where('code', 'dimension')->first()->id,
        ]);

        Unit::create([
            'name' => 'Inch',
            'symbol' => 'in',
            'type_id' => Type::ofUnit()->where('code', 'dimension')->first()->id,
        ]);

        Unit::create([
            'name' => 'Milimeter',
            'symbol' => 'mm',
            'type_id' => Type::ofUnit()->where('code', 'dimension')->first()->id,
        ]);

        Unit::create([
            'name' => 'Square Meter',
            'symbol' => 'm2',
            'type_id' => Type::ofUnit()->where('code', 'dimension')->first()->id,
        ]);

        Unit::create([
            'name' => 'Feet',
            'symbol' => 'ft',
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

        Unit::create([
            'name' => 'Set',
            'symbol' => 'set',
            'type_id' => Type::ofUnit()->where('code', 'quantity')->first()->id,
        ]);

        Unit::create([
            'name' => 'Assembly',
            'symbol' => 'asy',
            'type_id' => Type::ofUnit()->where('code', 'quantity')->first()->id,
        ]);

        Unit::create([
            'name' => 'Kit',
            'symbol' => 'kit',
            'type_id' => Type::ofUnit()->where('code', 'quantity')->first()->id,
        ]);

        Unit::create([
            'name' => 'Pack',
            'symbol' => 'pac',
            'type_id' => Type::ofUnit()->where('code', 'quantity')->first()->id,
        ]);

        Unit::create([
            'name' => 'Can',
            'symbol' => 'can',
            'type_id' => Type::ofUnit()->where('code', 'quantity')->first()->id,
        ]);

        Unit::create([
            'name' => 'Tube',
            'symbol' => 'tub',
            'type_id' => Type::ofUnit()->where('code', 'quantity')->first()->id,
        ]);

        Unit::create([
            'name' => 'Bottle',
            'symbol' => 'btl',
            'type_id' => Type::ofUnit()->where('code', 'quantity')->first()->id,
        ]);

        Unit::create([
            'name' => 'Sheet',
            'symbol' => 'sht',
            'type_id' => Type::ofUnit()->where('code', 'quantity')->first()->id,
        ]);

        Unit::create([
            'name' => 'Bar',
            'symbol' => 'bar',
            'type_id' => Type::ofUnit()->where('code', 'quantity')->first()->id,
        ]);

        Unit::create([
            'name' => 'Paa',
            'symbol' => 'Pair',
            'type_id' => Type::ofUnit()->where('code', 'quantity')->first()->id,
        ]);

        /** WEIGHT / VOLUME */

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

        Unit::create([
            'name' => 'Quart',
            'symbol' => 'qt',
            'type_id' => Type::ofUnit()->where('code', 'weight')->first()->id,
        ]);

        Unit::create([
            'name' => 'Gallon',
            'symbol' => 'gal',
            'type_id' => Type::ofUnit()->where('code', 'weight')->first()->id,
        ]);

        Unit::create([
            'name' => 'Pound',
            'symbol' => 'lb',
            'type_id' => Type::ofUnit()->where('code', 'weight')->first()->id,
        ]);

        Unit::create([
            'name' => 'Pail',
            'symbol' => 'pai',
            'type_id' => Type::ofUnit()->where('code', 'weight')->first()->id,
        ]);

        Unit::create([
            'name' => 'Ounce',
            'symbol' => 'ons',
            'type_id' => Type::ofUnit()->where('code', 'weight')->first()->id,
        ]);
    }
}
