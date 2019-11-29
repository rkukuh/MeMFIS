<?php

use App\Models\Religion;
use Illuminate\Database\Seeder;

class ReligionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Religion::create([
            'code' => 'buddha',
            'name' => 'Buddha'
        ]);

        Religion::create([
            'code' => 'catholic',
            'name' => 'Catholic'
        ]);

        Religion::create([
            'code' => 'christian-protestant',
            'name' => 'Christian Protestant'
        ]);

        Religion::create([
            'code' => 'hindu',
            'name' => 'Hindu'
        ]);

        Religion::create([
            'code' => 'kong-hu-cu',
            'name' => 'Kong Hu Cu'
        ]);

        Religion::create([
            'code' => 'islam',
            'name' => 'Islam'
        ]);

    }
}
