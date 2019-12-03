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
            'name' => 'Menikah',
            'of'   => 'marital',
        ]);

        Status::create([
            'code' => 'single',
            'name' => 'Belum Menikah',
            'of'   => 'marital',
        ]);

        Status::create([
            'code' => 'janda',
            'name' => 'Janda',
            'of'   => 'marital',
        ]);

        Status::create([
            'code' => 'duda',
            'name' => 'Duda',
            'of'   => 'marital',
        ]);

        Status::create([
            'code' => 'cerai-hidup',
            'name' => 'Cerai Hidup',
            'of'   => 'marital',
        ]);

        Status::create([
            'code' => 'cerai-mati',
            'name' => 'Cerai Mati',
            'of'   => 'marital',
        ]);
    }
}
