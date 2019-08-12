<?php

namespace App\Models\Pivots;

use App\Models\Benefit;
use App\Models\Position;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;
class BenefitsPosition extends Pivot
{
    use SoftDeletes;
}
