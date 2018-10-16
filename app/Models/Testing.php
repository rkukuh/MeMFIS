<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Testing extends Model implements HasMedia
{

    use HasMediaTrait;


    protected $fillable = [
        'name',
    ];

}
