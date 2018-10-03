<?php

use App\models\Status;
use Illuminate\Database\Seeder;

class Statuses extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Status::class, 20)->create();
    }
}
