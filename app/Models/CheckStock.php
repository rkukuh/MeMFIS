<?php

namespace App\Models;

use App\Models\Item;
use App\Models\FefoIn;
use App\Models\Storage;
use App\Models\GoodsReceived;
use Illuminate\Database\Eloquent\Model;

class CheckStock extends Model
{
    /**
     * Get the Item's stock.
     *
     * @param  string  $value
     * @return string
     */
    public function item($item)
    {
        $item_id = Item::where('uuid',$item)->first()->id;

        $FefoIn = FefoIn::with('item','storage')
                        ->groupBy('item_id')
                        ->selectRaw('item_id, sum(quantity) as sum')
                        ->get();

        return $FefoIn;
    }

    /**
     * Get the Item's stock.
     *
     * @param  string  $value
     * @return string
     */
    public function itemStorage($item, $storage)
    {
        $item_id = Item::where('uuid',$item)->first()->id;
        $storage_id = Storage::where('uuid',$storage)->first()->id;

        $FefoIn = FefoIn::where('item_id',$item_id)->where('storage_id',$storage_id)
                        ->selectRaw('item_id, sum(quantity) as sum')
                        ->get();

        return $FefoIn;
    }

    /**
     * Get the Item's stock with booked item.
     *
     * @param  string  $value
     * @return string
     */
    public function itemStorageWithBook($item, $storage, $goodsreceived)
    {
        $item_id = Item::where('uuid',$item)->first()->id;
        $storage_id = Storage::where('uuid',$storage)->first()->id;
        $GoodsReceived_id = GoodsReceived::where('uuid',$goodsreceived)->first()->id;

        $FefoIn = FefoIn::where('item_id',$item_id)->where('storage_id',$storage_id)->where('grn_id',$GoodsReceived_id)
                        ->selectRaw('item_id, sum(quantity) as sum')
                        ->get();

        return $FefoIn;
    }
}
