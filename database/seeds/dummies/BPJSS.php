<?php

use App\Models\BPJS;
use Illuminate\Database\Seeder;

class BPJSS extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BPJS::class, config('memfis.dummies.BPJSS'))->create();
    }
}
