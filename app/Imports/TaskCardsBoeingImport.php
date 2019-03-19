<?php

namespace App\Imports;

use App\Models\TaskCard;
use App\Models\Type;
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
        return new TaskCard([
            'number' => $row[0],
            'estimation_manhour' => $row[1],
            'performance_factor' => 1.6,
            'title' => $row[3],
            'task_id' => 1,
            'type_id' => Type::where('name', 'Basic')->first()->id,
            'work_area' => 1,
            'skill_id' => 1,
            'version' => json_encode($row[7]),
            'zone' => $row[12],
            'access' => $row[13],
            'effectivity' => $row[14],
            'source' => $row[15],
            'description' => $row[18],
            'is_rii' => false,
        ]);
    }
}
