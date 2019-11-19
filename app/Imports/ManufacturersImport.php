<?php

namespace App\Imports;

use App\Models\Manufacturer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ManufacturersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $manufacturer = new Manufacturer([
            'code' => $row['code'],
            'name' => $row['name'],
        ]);

        $manufacturer->save();
    }
}
