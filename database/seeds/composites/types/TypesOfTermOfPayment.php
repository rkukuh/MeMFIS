<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfTermOfPayment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'cash',
            'name' => 'Cash',
            'of'  => 'term-of-payment',
        ]);

        Type::create([
            'code' => 'by-date',
            'name' => 'By Date',
            'of'  => 'term-of-payment',
        ]);
    }
}
