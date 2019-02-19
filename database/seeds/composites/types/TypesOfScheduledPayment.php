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
            'code' => 'by-date',
            'name' => 'By Date',
            'of'   => 'scheduled-payment',
        ]);

        Type::create([
            'code' => 'by-progress',
            'name' => 'By Project Progress',
            'of'   => 'scheduled-payment',
        ]);
    }
}
