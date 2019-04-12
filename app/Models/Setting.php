<?php

namespace App\Models;

use App\MemfisModel;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'name',
        'description',
        'of',
        'value',
    ];
}
