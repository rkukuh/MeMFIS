<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfPaymentTerm extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => '30-hari',
            'name' => '30 hari',
            'of'   => 'payment-term',
        ]);

        Type::create([
            'code' => 'dp-50',
            'name' => 'DP Pelunasan 50% setelah selesai',
            'of'   => 'payment-term',
        ]);

        Type::create([
            'code' => '30-30-40',
            'name' => 'Termin 30%-30%-40%',
            'of'   => 'payment-term',
        ]);
    }
}
