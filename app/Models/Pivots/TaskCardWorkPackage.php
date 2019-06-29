<?php

namespace App\Models\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TaskCardWorkPackage extends Pivot
{
    use SoftDeletes;

    protected $table = 'taskcard_workpackage';
}
