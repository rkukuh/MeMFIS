<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfScheduledPayment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'persentage',
            'name' => 'Persentage',
            'of'   => 'scheduled-payment',
        ]);

        Type::create([
            'code' => 'amount',
            'name' => 'Amount',
            'of'   => 'scheduled-payment',
        ]);
    }
}
