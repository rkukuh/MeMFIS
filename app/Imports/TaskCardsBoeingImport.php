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
        return new TaskCard([
            'number' => $row['number'],
            'title' => $row['title'],
            'type_id' => null, // TODO: Import appropriate value
            'task_id' => null, // TODO: Import appropriate value
            'skill_id' => null, // TODO: Import appropriate value
            'work_area' => null, // TODO: Import appropriate value
            'estimation_manhour' => $row['manhours'],
            'is_rii' => $row['is_rii'],
            'source' => $row['source'],
            'effectivity' => $row['effectivity'],
            'version' => json_encode($row['version']),
            'description' => $row['description'],
        ]);

        // TODO: M-M values:
        // - Table: aircraft_taskcard
        // - Table: taskcard_zone

        // TODO: Polymorph values:
        // - Table: accesses
        // - Table: thresholds
        // - Table: repeats
    }
}
