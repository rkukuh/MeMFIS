<?php

use App\Models\GoodsReceived;
use Illuminate\Database\Seeder;

class GoodsReceiveds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(GoodsReceived::class, config('memfis.dummies.goods-received'))->create();
    }
}
