<?php

namespace App\Imports;

use App\Models\Type;
use App\Models\TaskCard;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TaskCardsBoeingImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        dump($row);

        return new TaskCard([
            'number' => $row['number'],
        ]);
    }
}
