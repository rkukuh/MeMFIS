<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfBenefitBaseCalculation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'monthly-fixed',
            'name' => 'Monthly Fixed',
            'of'   => 'benefit-base-calculation',
        ]);

        Type::create([
            'code' => 'annually-fixed',
            'name' => 'Annually Fixed',
            'of'   => 'benefit-base-calculation',
        ]);

        Type::create([
            'code' => 'daily-presence',
            'name' => 'Daily Presence',
            'of'   => 'benefit-base-calculation',
        ]);

        Type::create([
            'code' => 'hourly-overtime',
            'name' => 'Hourly Overtime',
            'of'   => 'benefit-base-calculation',
        ]);
    }
}
