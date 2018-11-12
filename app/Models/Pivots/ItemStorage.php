<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ItemStorage extends Pivot
{
    use SoftDeletes;
}
