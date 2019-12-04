<?php

namespace App\Imports;

use App\Models\Unit;
use App\Models\Item;
use App\Models\TaskCard;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AttachItemToTaskCard implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        switch ($row['unit']) {
            case 'pai':
                $unit = Unit::where('symbol', 'pai')->first();
                break;
            case 'gal':
                $unit = Unit::where('symbol', 'gal')->first();
                break;
            case 'ea':
                $unit = Unit::where('symbol', 'ea')->first();
                break;
            case 'lt':
                $unit = Unit::where('symbol', 'lt')->first();
                break;
            case 'can':
                $unit = Unit::where('symbol', 'can')->first();
                break;
            case 'can':
                $unit = Unit::where('symbol', 'can')->first();
                break;
            case 'roll':
                $unit = Unit::where('symbol', 'roll')->first();
                break;
            case 'kg':
                $unit = Unit::where('symbol', 'kg')->first();
                break;
            default:
                $unit = null;
        }

        $taskcard = TaskCard::where('number', $row['tc'])->first();
        $item = Item::where('code', strval($row['pn']))->first();

        if($taskcard && $item){
            $result = $taskcard->items()->attach($item->id, [
                'unit_id' => $unit->id,
                'quantity' => $row['qty']
            ]);

        }
    }
}
