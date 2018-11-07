<?php

use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit', '-1');

        $this->call(CertifiedStaff_GeneralLicense::class);
        $this->call(CertifiedStaff_AMELicense::class);
    }
}
