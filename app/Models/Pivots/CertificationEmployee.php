<?php

namespace App\Models\Pivots;

use App\Models\Employee;
use App\Models\Certification;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CertificationEmployee extends Pivot
{
    use SoftDeletes;
}
