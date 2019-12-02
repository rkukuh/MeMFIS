<?php

use Illuminate\Database\Seeder;

class ExampleDataSeeder extends Seeder
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
        $this->call(CertifiedStaff_AMEL::class);
        $this->call(PositionExamples::class);
        $this->call(LeaveTypeExamples::class);
        $this->call(BPJSExamples::class);
        $this->call(BenefitExamples::class);
    }
}
