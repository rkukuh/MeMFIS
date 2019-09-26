<?php

use Illuminate\Database\Seeder;
use App\Models\Manhour;

class ManhoursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manhour::create([
            'rate' => 15,
            'level' => '1',
        ]);
        Manhour::create([
            'rate' => 25,
            'level' => '2',
        ]);
        Manhour::create([
            'rate' => 35,
            'level' => '3',
        ]);
        Manhour::create([
            'rate' => 45,
            'level' => '4',
        ]);
        Manhour::create([
            'rate' => 55,
            'level' => '5',
        ]);

    }
}
