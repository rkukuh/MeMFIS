<?php

namespace App\Observers;

use App\Models\GoodsReceived;

class GoodsReceivedObserver
{
    /**
     * Handle the goods received "created" event.
     *
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return void
     */
    public function created(GoodsReceived $goodsReceived)
    {
        $goodsReceived->branches()->attach(1);
    }

    /**
     * Handle the goods received "updated" event.
     *
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return void
     */
    public function updated(GoodsReceived $goodsReceived)
    {
        //
    }

    /**
     * Handle the goods received "deleted" event.
     *
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return void
     */
    public function deleted(GoodsReceived $goodsReceived)
    {
        // rollback
    }

    /**
     * Handle the goods received "restored" event.
     *
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return void
     */
    public function restored(GoodsReceived $goodsReceived)
    {
        //
    }

    /**
     * Handle the goods received "force deleted" event.
     *
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return void
     */
    public function forceDeleted(GoodsReceived $goodsReceived)
    {
        //
    }
}
