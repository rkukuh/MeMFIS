<?php

use App\Models\Storage;
use Illuminate\Database\Seeder;

class Storages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Storage::class, config('memfis.examples.storages'))->create();
    }
}
