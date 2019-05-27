<?php

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelsOfCustomer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'code'  => 'lv1',
            'name'  => 'Level 1',
            'score' => 1,
            'of'    => 'customer',
        ]);

        Level::create([
            'code'  => 'lv2',
            'name'  => 'Level 2',
            'score' => 2,
            'of'    => 'customer',
        ]);

        Level::create([
            'code'  => 'lv3',
            'name'  => 'Level 3',
            'score' => 3,
            'of'    => 'customer',
        ]);

        Level::create([
            'code'  => 'lv4',
            'name'  => 'Level 4',
            'score' => 4,
            'of'    => 'customer',
        ]);

        Level::create([
            'code'  => 'lv5',
            'name'  => 'Level 5',
            'score' => 5,
            'of'    => 'customer',
        ]);
    }
}
