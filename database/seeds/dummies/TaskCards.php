<?php

use App\Models\TaskCard;
use Illuminate\Database\Seeder;

class TaskCards extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(TaskCard::class, config('memfis.dummies.taskcards'))->create();

        // TODO: Generate task card: basic
        // TODO: Generate task card: eo
        // TODO: Generate task card: si
    }
}
