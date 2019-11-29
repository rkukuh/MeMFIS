<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfNationality extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'indonesian',
            'name' => 'Indonesian',
            'of'  => 'nationality',
        ]);
    }
}
