<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfRIRGeneralDocument extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'invoice',
            'name' => 'Invoice',
            'of'   => 'rir-general-document',
        ]);

        Type::create([
            'code' => 'airway-bill',
            'name' => 'Airway Bill',
            'of'   => 'rir-general-document',
        ]);

        Type::create([
            'code' => 'shipping-document',
            'name' => 'Shipping Document',
            'of'   => 'rir-general-document',
        ]);
    }
}
