<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PurchaseOrderItem extends Pivot
{
    use SoftDeletes;

    protected $table = 'item_purchase_order';
}
