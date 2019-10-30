<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfRIRTechnicalDocument extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'comformity-certificate',
            'name' => 'Certificate of Comformity',
            'of'   => 'rir-technical-document',
        ]);

        Type::create([
            'code' => 'arc-aat',
            'name' => 'ARC / AAT',
            'of'   => 'rir-technical-document',
        ]);
    }
}
