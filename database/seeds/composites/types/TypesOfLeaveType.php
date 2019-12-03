<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfLeaveType extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'daily',
            'name' => 'Daily Based',
            'of'   => 'leave-type',
        ]);

        Type::create([
            'code' => 'multi-day',
            'name' => 'Multi-day Based',
            'of'   => 'leave-type',
        ]);

    }
}
