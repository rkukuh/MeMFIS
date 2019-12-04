<?php

use App\Models\Type;
use App\Models\Benefit;
use Illuminate\Database\Seeder;

class BenefitExamples extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** dummy benefits examples for trial */

        Benefit::create([
            'code' => 'GP001',
            'name' => 'Gaji Pokok',
            'description' => 'Gaji Pokok karyawan',
            'base_calculation' => Type::OfBenefitBaseCalculation()->where('code', 'period-fixed')->first()->id,
            'prorate_calculation' => Type::OfBenefitProrateCalculation()->where('code', 'none')->first()->id,
        ]);

        Benefit::create([
            'code' => 'THR001',
            'name' => 'THR ',
            'description' => 'THR Tahunan karyawan MMF',
            'base_calculation' => Type::OfBenefitBaseCalculation()->where('code', 'annually-fixed')->first()->id,
            'prorate_calculation' => Type::OfBenefitProrateCalculation()->where('code', 'month-to-year')->first()->id,
        ]);

        Benefit::create([
            'code' => 'UM001',
            'name' => 'Uang Makan  ',
            'description' => 'Uang Makan Staff MMF',
            'base_calculation' => Type::OfBenefitBaseCalculation()->where('code', 'daily-presence')->first()->id,
            'prorate_calculation' => Type::OfBenefitProrateCalculation()->where('code', 'day-to-month')->first()->id,
        ]);

        Benefit::create([
            'code' => 'OVT001',
            'name' => 'Uang Lembur ',
            'description' => 'Uang Lembur Staff MMF',
            'base_calculation' => Type::OfBenefitBaseCalculation()->where('code', 'hourly-overtime')->first()->id,
            'prorate_calculation' => Type::OfBenefitProrateCalculation()->where('code', 'hour-to-day')->first()->id,
        ]);
        
    }
}
