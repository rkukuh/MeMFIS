<?php

namespace App\Models;

use App\MemfisModel;

class FefoIn extends MemfisModel
{
    protected $table = 'fefo_in';

    protected $fillable = [
        'item_id',
        'storage_id',
        'inventoryin_id',
        'fefoin_at',
        'quantity',
        'used_quantity',
        'serial_number',
        'grn_id',
        'price',
        'expired_at',
    ];

    protected $dates = ['fefoin_at','expired_at'];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A FefoIn may have one good received.
     *
     * This function will retrieve the good received of a FefoIn.
     * See: GoodsReceived's fefoins() method for the inverse
     *
     * @return mixed
     */
    public function good_received()
    {
        return $this->belongsTo(GoodsReceived::class, 'grn_id');
    }

    /**
     * One-to-Many: A inventory must have an inventory in
     *
     * This function will retrieve the inventory in of a inventory.
     * See: Aircraft's inventorys() method for the inverse
     *
     * @return mixed
     */
    public function inventoryIn()
    {
        return $this->belongsTo(InventoryIn::class, 'inventoryin_id');

    }

    /**
     * This function will get a item of an fofo in.
     *
     * @return mixed
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * This function will get a storage of an fofo in.
     *
     * @return mixed
     */
    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

}
