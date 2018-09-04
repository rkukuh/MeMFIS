<?php

namespace App;

use App\Traits\UuidKey;
use App\Traits\Timestampable;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemfisModel extends Model
{
    use UuidKey;
    use SoftDeletes;
    use Timestampable;
    use \OwenIt\Auditing\Auditable;

    protected $hidden = ['id'];

    protected $dates = ['deleted_at'];

    /***************************************** OVERRIDE *******************************************/

    public function getRouteKeyName()
    {
        return 'uuid';
    }
}
