<?php

use App\Models\ItemRequest;
use Illuminate\Database\Seeder;

class ItemRequests extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ItemRequest::class, config('memfis.dummies.item-requests'))->create();
    }
}
