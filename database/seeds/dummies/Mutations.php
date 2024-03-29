<?php

use App\Models\Mutation;
use Illuminate\Database\Seeder;

class Mutations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Mutation::class, config('memfis.dummies.mutations'))->create();
    }
}
