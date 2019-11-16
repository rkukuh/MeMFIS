<?php

namespace App\Imports;

use App\Models\Aircraft;
use App\Models\Manufacturer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AircraftsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $manufacturer = Manufacturer::where('code', $row['manufacturer'])->first();
        $aircraft = new Aircraft([
            'code' => $row['code'],
            'name' => $row['name'],
            'manufacturer_id' => $manufacturer->id,
        ]);

        $aircraft->save();
    }
}
