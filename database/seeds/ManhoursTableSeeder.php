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
            'rate' => null,
            'level' => '1',
        ]);
        Manhour::create([
            'rate' => null,
            'level' => '2',
        ]);
        Manhour::create([
            'rate' => null,
            'level' => '3',
        ]);
        Manhour::create([
            'rate' => null,
            'level' => '4',
        ]);
        Manhour::create([
            'rate' => null,
            'level' => '5',
        ]);

    }
}
