<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

     protected $dates = ['deleted_at'];

     protected $fillable = [
        'branch_id',
        'code',
        'name',
        'address',
        'city',
        'email',
        'phone1',
        'phone2',
        'fax',
        'contactpersoon',
        'IDType',
        'IDNumber',
        'NPWE',
        'NPWPAdress',
        'Leveling',
        'xType',
        'xType1',
        'Type2',
        'xType3',
        'active',
        'ToP',
        'AccountCode',
    ];

}
