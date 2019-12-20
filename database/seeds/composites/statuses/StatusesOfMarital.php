<?php

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusesOfMarital extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'code' => 'married',
            'name' => 'Married',
            'of'   => 'marital',
        ]);

        Status::create([
            'code' => 'mar-1-ch',
            'name' => 'Married with 1 Child',
            'of'   => 'marital',
        ]);

        Status::create([
            'code' => 'mar-2-ch',
            'name' => 'Married with 2 childs',
            'of'   => 'marital',
        ]);

        Status::create([
            'code' => 'mar-3-ch',
            'name' => 'Married with 3 childs or more',
            'of'   => 'marital',
        ]);

        Status::create([
            'code' => 'not-married',
            'name' => 'Not Married',
            'of'   => 'marital',
        ]);

        Status::create([
            'code' => 'nm-1-ch',
            'name' => 'Not Married with 1 child',
            'of'   => 'marital',
        ]);

        Status::create([
            'code' => 'nm-2-ch',
            'name' => 'Not Married with 2 childs',
            'of'   => 'marital',
        ]);

        Status::create([
            'code' => 'nm-3-ch',
            'name' => 'Not Married with 3 childs or more',
            'of'   => 'marital',
        ]);

        Status::create([
            'code' => 'divorced',
            'name' => 'Divorced',
            'of'   => 'marital',
        ]);
    }
}
