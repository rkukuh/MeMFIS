<?php

namespace App\Imports;

use App\Models\Type;
use App\Models\Zone;
use App\Models\Access;
use App\Models\Aircraft;
use App\Models\TaskCard;
use App\Models\Threshold;
use App\Models\Repeat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TaskCardsCNItemimport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {


        switch ($row['uom']) {
            case 'PASS CABIN':
                $work_area = Unit::where('name', 'PASS CABIN')->first()->id;
                break;
            default:
                $work_area = null;

        }

        $item = Item::where('code',$row['part_number'])->first()->id;
        $taskcard = TaskCard::where('number',$row['taskcard_number'])->first();


        $taskcard->items()->attach($taskcard->id, [
            'item_id' => $item,
            'unit_id' => $taskcard,
            'quantity' => $row['taskcard_number'],
        ]);


    }
}
