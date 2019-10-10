<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfBenefitProrateCalculation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'none',
            'name' => 'None',
            'of'   => 'benefit-prorate-calculation',
        ]);

        Type::create([
            'code' => 'hour-to-day',
            'name' => 'Hour to Day',
            'of'   => 'benefit-prorate-calculation',
        ]);

        Type::create([
            'code' => 'day-to-month',
            'name' => 'Day to Month',
            'of'   => 'benefit-prorate-calculation',
        ]);

        Type::create([
            'code' => 'month-to-year',
            'name' => 'Month to Year',
            'of'   => 'benefit-prorate-calculation',
        ]);
    }
}
