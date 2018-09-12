<?php

use Illuminate\Database\Seeder;
use App\Models\Type;

class Types extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Type::class, 10)->create();
    }
}
