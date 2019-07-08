<?php

namespace App\Imports;

use App\Models\Unit;
use App\Models\Item;
use App\Models\TaskCard;
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


        /** Set the unit of measurement */

        switch ($row['um']) {
            case 'EA':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Each')->first()->id;
                break;
            case 'SET':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Set')->first()->id;
                break;
            case 'ASY':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Assembly')->first()->id;
                break;
            case 'UNT':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Unit')->first()->id;
                break;
            case 'KIT':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Kit')->first()->id;
                break;
            case 'M':
                $unit = Unit::ofDimension()
                            ->where('name', 'Meter')->first()->id;
                break;
            case 'MM':
                $unit = Unit::ofDimension()
                            ->where('name', 'Milimeter')->first()->id;
                break;
            case 'M2':
                $unit = Unit::ofDimension()
                            ->where('name', 'Square Meter')->first()->id;
                break;
            case 'QT':
                $unit = Unit::ofWeight()
                            ->where('name', 'Quart')->first()->id;
                break;
            case 'PAC':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Pack')->first()->id;
                break;
            case 'GAL':
                $unit = Unit::ofWeight()
                            ->where('name', 'Gallon')->first()->id;
                break;
            case 'KG':
                $unit = Unit::ofWeight()
                            ->where('name', 'Kilogram')->first()->id;
                break;
            case 'CAN':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Can')->first()->id;
                break;
            case 'FT':
                $unit = Unit::ofDimension()
                            ->where('name', 'Foot')->first()->id;
                break;
            case 'LB':
                $unit = Unit::ofWeight()
                            ->where('name', 'Pound')->first()->id;
                break;
            case 'PAI':
                $unit = Unit::ofWeight()
                            ->where('name', 'Pail')->first()->id;
                break;
            case 'TUB':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Tube')->first()->id;
                break;
            case 'OC':
                $unit = Unit::ofWeight()
                            ->where('name', 'Ounce')->first()->id;
            case 'ONS':
                $unit = Unit::ofWeight()
                            ->where('name', 'Ounce')->first()->id;
                break;
            case 'BT':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Bottle')->first()->id;
                break;
            case 'ROL':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Roll')->first()->id;
                break;
            case 'ROLL':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Roll')->first()->id;
                break;
            case 'L':
                $unit = Unit::ofWeight()
                            ->where('name', 'Liter')->first()->id;
                break;
            case 'SHT':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Sheet')->first()->id;
                break;
            case 'PAA':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Paa')->first()->id;
                break;
            case 'BAR':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Bar')->first()->id;
                break;
            default:
                $unit = null;
        }

        $item = Item::where('code',$row['part_number'])->first();
        dump($row['part_number']);
        $taskcard = TaskCard::where('number',$row['taskcard_number'])->first();


        $taskcard->items()->attach($taskcard->id, [
            'item_id' => $item->id,
            'unit_id' => $unit,
            'note' => $row['description'],
            'quantity' => $row['qty'],
        ]);


    }
}
