<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfHtCrrCloseReason extends Seeder
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
            'of'   => 'htcrr-close-reason',
        ]);

        Type::create([
            'code' => 'other',
            'name' => 'Other',
            'of'   => 'htcrr-close-reason',
        ]);
    }
}
