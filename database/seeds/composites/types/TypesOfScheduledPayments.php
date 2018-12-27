<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfScheduledPayments extends Seeder
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
            'of'   => 'scheduled-payments',
        ]);

        Type::create([
            'code' => 'amount',
            'name' => 'Amount',
            'of'   => 'scheduled-payments',
        ]);
    }
}
