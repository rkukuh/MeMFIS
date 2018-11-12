<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ItemUnit extends Pivot
{
    use SoftDeletes;
}
