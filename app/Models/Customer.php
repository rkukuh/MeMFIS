<?php

namespace App\Models;

use App\MemfisModel;

class Customer extends MemfisModel
{
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
