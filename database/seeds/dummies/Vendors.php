<?php

use App\Models\Vendor;
use Illuminate\Database\Seeder;

class Vendors extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Vendor::class, config('memfis.dummies.vendors'))->create();
    }
}
