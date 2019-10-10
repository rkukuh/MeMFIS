<?php

namespace App\Models\Pivots;

use App\Models\Item;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Interchange extends Pivot
{
    use SoftDeletes;

    protected $table = 'interchanges';

    protected $fillable = [
        'item_id',
        'alternate_item_id',
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
     * One-Way: An alternate item is an item.
     *
     * @return mixed
     */
    public function alternate_item()
    {
        return $this->belongsTo(Item::class);
    }
}
