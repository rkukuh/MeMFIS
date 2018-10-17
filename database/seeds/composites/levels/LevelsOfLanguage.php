<?php

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelsOfLanguage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Source: https://www.cactuslanguage.com/language-level-tests

        Level::create([
            'code'  => 'a1',
            'name'  => 'Beginner',
            'of'    => 'language',
            'score' => 10,
        ]);

        Level::create([
            'code'  => 'a2',
            'name'  => 'Elementary',
            'of'    => 'language',
            'score' => 20,
        ]);

        Level::create([
            'code'  => 'b1',
            'name'  => 'Intermediate',
            'of'    => 'language',
            'score' => 30,
        ]);

        Level::create([
            'code'  => 'b2',
            'name'  => 'Upper Intermediate',
            'of'    => 'language',
            'score' => 40,
        ]);

        Level::create([
            'code'  => 'c1',
            'name'  => 'Advanced',
            'of'    => 'language',
            'score' => 50,
        ]);

        Level::create([
            'code'  => 'c2',
            'name'  => 'Proficient',
            'of'    => 'language',
            'score' => 60,
        ]);
    }
}
