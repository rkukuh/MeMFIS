<?php

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelsOfOTR extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'code'  => 'mechanic',
            'name'  => 'Suporting Staff (Mechanic)',
            'score' => 1,
            'of'    => 'otr',
        ]);

        Level::create([
            'code'  => 'engineer',
            'name'  => 'Engineer',
            'score' => 2,
            'of'    => 'otr',
        ]);

        Level::create([
            'code'  => 'rii',
            'name'  => 'Inspector (RII)',
            'score' => 3,
            'of'    => 'otr',
        ]);
    }
}
