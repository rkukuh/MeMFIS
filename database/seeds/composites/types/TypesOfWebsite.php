<?php

use App\Models\Type;
use Illuminate\Database\Seeder;

class TypesOfWebsite extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'code' => 'blog',
            'name' => 'Blog',
            'of'   => 'website',
        ]);

        Type::create([
            'code' => 'compro',
            'name' => 'Company Profile',
            'of'   => 'website',
        ]);

        Type::create([
            'code' => 'ig',
            'name' => 'Instagram',
            'of'   => 'website',
        ]);

        Type::create([
            'code' => 'fb',
            'name' => 'Facebook',
            'of'   => 'website',
        ]);

        Type::create([
            'code' => 'tw',
            'name' => 'Twitter',
            'of'   => 'website',
        ]);

        Type::create([
            'code' => 'yt',
            'name' => 'Youtube',
            'of'   => 'website',
        ]);

        Type::create([
            'code' => 'personal',
            'name' => 'Personal',
            'of'   => 'website',
        ]);
    }
}
