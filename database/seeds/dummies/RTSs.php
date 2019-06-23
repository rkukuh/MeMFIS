<?php

use App\Models\RTS;
use Illuminate\Database\Seeder;

class RTSs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RTS::class, config('memfis.dummies.rts'))->create();
    }
}
