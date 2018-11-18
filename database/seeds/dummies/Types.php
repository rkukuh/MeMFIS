<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class Types extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Type::class, config('memfis.dummies.types'))->create();
    }
}
