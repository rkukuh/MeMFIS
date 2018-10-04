<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfRegulator extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'dgca',
            'name' => 'DGCA (Directorate General Of Civil Aviation)',
            'of'   => 'regulator',
        ]);

        Type::create([
            'code' => 'easa',
            'name' => 'EASA (European Aviation Safety Agency)',
            'of'   => 'regulator',
        ]);

        Type::create([
            'code' => 'faa',
            'name' => 'FAA (Federal Aviation Administration)',
            'of'   => 'regulator',
        ]);
    }
}
