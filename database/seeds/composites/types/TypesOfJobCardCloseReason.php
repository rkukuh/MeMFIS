<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfJobCardCloseReason extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'accomplished',
            'name' => 'Accomplished',
            'of'   => 'jobcard-close-reason',
        ]);

        Type::create([
            'code' => 'other',
            'name' => 'Other',
            'of'   => 'jobcard-close-reason',
        ]);
    }
}
