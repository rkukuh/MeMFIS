<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfTaskCardEORecurrence extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'one-time',
            'name' => 'One-Time',
            'of'  => 'taskcard-eo-recurrence',
        ]);

        Type::create([
            'code' => 'as-required',
            'name' => 'As Required',
            'of'  => 'taskcard-eo-recurrence',
        ]);

        Type::create([
            'code' => 'repetitive',
            'name' => 'Repetitive',
            'of'  => 'taskcard-eo-recurrence',
        ]);
    }
}
