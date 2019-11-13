<?php

namespace App\Models\Pivots;

use App\Models\Unit;
use App\Models\Item;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PurchaseRequestItem extends Pivot
{
    use SoftDeletes;

    protected $table = 'item_purchase_request';

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-Way: An item is an item.
     *
     * @return mixed
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * One-Way: A Purchse Rquest's Item must have a unit assigned to.
     *
     * @return mixed
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
