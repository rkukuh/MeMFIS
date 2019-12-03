<?php

namespace App\Imports;

use App\Models\Unit;
use App\Models\Item;
use App\Models\Price;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class MaterialsAndToolsImportDecember implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        /** Set the unit of measurement */

        if( $row['unit'] ){
            $unit = Unit::where('symbol', $row['unit'])->first()->id;
        }else{
            $unit = null;
        }
       

        /** Set the category */

        switch ($row['category']) {
            case 'Consumable':
                $category = Category::ofItem()
                                    ->where('name', 'Consumable')->first()->id;
                break;
            case 'Raw Material':
                $category = Category::ofItem()
                                    ->where('name', 'Raw Material')->first()->id;
                break;
            case 'Tools':
                $category = Category::ofItem()
                                    ->where('name', 'Tool')->first()->id;
                break;
            case 'Component':
                $category = Category::ofItem()
                                    ->where('name', 'Component')->first()->id;
                break;
            default:
                $category = Category::ofItem()
                                    ->where('name', 'Consumable')->first()->id;
        }

        switch ($row['stockable']) {
            case 'YES':
                $is_stock = true;
                break;
            default:
                $is_stock = false;
        }

        $item = new Item([
            'code'      => $row['pn'],
            'name'      => $row['name'],
            'unit_id'   => $unit,
            'is_stock'  => $is_stock,
        ]);

        $item->save();

        for($i=1;$i<=5;$i++){
            $item->prices()
            ->save(new Price (['amount' =>0,'level' =>$i]));
        }

        $item->categories()->sync($category);
    }

    /**
     * Batch size for importing items data.
     */
    public function batchSize(): int
    {
        return 250;
    }
    
    /** 
     * Chunk siza data.
     */
    public function chunkSize(): int
    {
        return 250;
    }
}
