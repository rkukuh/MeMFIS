<?php

namespace App\Imports;

use App\Models\Unit;
use App\Models\Item;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EnginesImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Item([
            'code'      => strtolower($row['part_no']),
            'name'      => strtoupper($row['part_no']),
            'unit_id'   => Unit::where('name', 'Each')->first()->id,
        ]);
    }
}
