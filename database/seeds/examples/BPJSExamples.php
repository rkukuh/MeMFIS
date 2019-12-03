<?php

use App\Models\BPJS;
use Illuminate\Database\Seeder;

class BPJSExamples extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** dummy Leave type examples for trial */
        BPJS::create([
            'code' => 'KKHT',
            'name' => 'BPJS Kesehatan',
            'employee_paid' => 1,
            'employee_min_value' => 10000,
            'employee_max_value' => 80000,
            'company_paid' => 4,
            'company_min_value' => 50000,
            'company_max_value' => 250000,
        ]);

        BPJS::create([
            'code' => 'JKN',
            'name' => 'BPJS Ketenagakerjaan',
            'employee_paid' => 1,
            'employee_min_value' => 10000,
            'employee_max_value' => 80000,
            'company_paid' => 4,
            'company_min_value' => 50000,
            'company_max_value' => 250000,
        ]);
        
    }
}
