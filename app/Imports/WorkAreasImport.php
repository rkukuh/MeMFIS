<?php

namespace App\Imports;

use App\Models\Type;
use Maatwebsite\Excel\Concerns\ToModel;

class WorkAreasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Type([
            'code'  => str_slug($row[0]),
            'name'  => mb_strtoupper($row[0]),
            'of'    => 'work-area',
        ]);
    }
}
