<?php

namespace App\Imports;

use App\Models\Unit;
use App\Models\Item;
use Spatie\Tags\Tag;
use App\Models\Price;
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
        $item = new Item([
            'code'      => strtolower($row['part_no']),
            'name'      => strtoupper($row['part_no']),
            'unit_id'   => Unit::ofQuantity()
                                ->where('name', 'Each')
                                ->first()
                                ->id,
            'is_stock'  => false,
        ]);

        $item->save();

        for($i=1;$i<=5;$i++){
            $item->prices()
            ->save(new Price (['amount' =>0,'level' =>$i]));
        }

        $item->tags()
             ->attach(
                Tag::getWithType('item')
                    ->where('name', 'Engine / Powerplant')
                    ->first()
             );

        return $item;
    }
}
