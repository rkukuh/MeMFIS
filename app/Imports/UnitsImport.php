<?php

namespace App\Imports;

use App\Models\Type;
use App\Models\Unit;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Faker as Faker;

class UnitsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        dump($row['type']);
        $type = Type::ofUnit()->where('name', $row['type'])->first()->id;
        dump($type);
        $unit = new Unit([
            'name' => $row['nama'],
            'symbol' => $row['symbol'],
            'type_id' => $type,
        ]);

        $unit->save();
    }
}
