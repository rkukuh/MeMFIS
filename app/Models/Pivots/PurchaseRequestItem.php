<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PurchaseRequestItem extends Pivot
{
    use SoftDeletes;

    protected $table = 'item_purchase_request';

    /*************************************** RELATIONSHIP ****************************************/
}
