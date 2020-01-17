<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfRIRMaterialCheckIdentification extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'conform',
            'name' => 'Conform',
            'of'   => 'rir-material-identification',
        ]);

        Type::create([
            'code' => 'not-conform',
            'name' => 'Not Conform',
            'of'   => 'rir-material-identification',
        ]);
    }
}
