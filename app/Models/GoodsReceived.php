<?php

namespace App\Models;

use App\MemfisModel;

class GoodsReceived extends MemfisModel
{
    protected $table = 'goods_received';

    protected $fillable = [
        'number',
        'received_at',
        'vehicle_no',
        'container_no',
        'description',
    ];

    protected $dates = ['received_at'];
}
