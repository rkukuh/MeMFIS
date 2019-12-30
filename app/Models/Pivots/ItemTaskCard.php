<?php

namespace App\Models\Pivots;

use App\Models\Item;
use App\Models\Unit;
use App\Models\Promo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ItemTaskCard extends Pivot
{
    use SoftDeletes;

    protected $table = 'item_taskcard';

    protected $fillable = [
        'taskcard_id',
        'item_id',
        'quantity',
        'unit_id',
        'note',
    ];

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
     * One-Way: A Purchse Order's Item must have a unit assigned to.
     *
     * @return mixed
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
