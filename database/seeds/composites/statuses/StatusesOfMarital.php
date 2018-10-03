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
            'name' => 'Menikah',
            'of'   => 'marital',
        ]);

        Status::create([
            'name' => 'Belum Menikah',
            'of'   => 'marital',
        ]);

        Status::create([
            'name' => 'Janda',
            'of'   => 'marital',
        ]);

        Status::create([
            'name' => 'Duda',
            'of'   => 'marital',
        ]);
    }
}
