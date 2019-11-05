<?php

namespace App\Imports;

use App\Models\Unit;
use App\Models\Item;
use App\Models\Price;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MaterialsAndToolsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        /** Set the unit of measurement */

        switch ($row['unit']) {
            case 'Each (ea)':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Each')->first()->id;
                break;
            case 'set (Set)':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Set')->first()->id;
                break;
            case 'Assembly (Asy)':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Assembly')->first()->id;
                break;
            case 'Unit (unt)':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Unit')->first()->id;
                break;
            case 'kit (Kit)':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Kit')->first()->id;
                break;
            case 'meter (m)':
                $unit = Unit::ofDimension()
                            ->where('name', 'Meter')->first()->id;
                break;
            case 'milimeter (mm)':
                $unit = Unit::ofDimension()
                            ->where('name', 'Milimeter')->first()->id;
                break;
            case 'Square Meter (m2)':
                $unit = Unit::ofDimension()
                            ->where('name', 'Square Meter')->first()->id;
                break;
            case 'Quart (qt)':
                $unit = Unit::ofWeight()
                            ->where('name', 'Quart')->first()->id;
                break;
            case 'Pack (pac)':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Pack')->first()->id;
                break;
            case 'Gallon (gal)':
                $unit = Unit::ofWeight()
                            ->where('name', 'Gallon')->first()->id;
                break;
            case 'Kilogram (kg)':
                $unit = Unit::ofWeight()
                            ->where('name', 'Kilogram')->first()->id;
                break;
            case 'can (Can)':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Can')->first()->id;
                break;
            case 'Feet (ft)':
                $unit = Unit::ofDimension()
                            ->where('name', 'Feet')->first()->id;
                break;
            case 'Pound (lb)':
                $unit = Unit::ofWeight()
                            ->where('name', 'Pound')->first()->id;
                break;
            case 'Pail (pai)':
                $unit = Unit::ofWeight()
                            ->where('name', 'Pail')->first()->id;
                break;
            case 'Tube (tub)':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Tube')->first()->id;
                break;
            case 'Ounce (ons)':
                $unit = Unit::ofWeight()
                            ->where('name', 'Ounce')->first()->id;
            case 'box (Box)':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Box')->first()->id;
                break;
            case 'Bottle (Btl)':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Bottle')->first()->id;
                break;
            case 'roll (Roll)':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Roll')->first()->id;
                break;
            case 'Liter (lt)':
                $unit = Unit::ofWeight()
                            ->where('name', 'Liter')->first()->id;
                break;
            case 'sheet (Sheet)':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Sheet')->first()->id;
                break;
            case 'pair (paa)':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Paa')->first()->id;
                break;
            case 'BAR':
                $unit = Unit::ofQuantity()
                            ->where('name', 'Bar')->first()->id;
                break;
            case 'null':
                $unit = null;
                break;
            default:
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
}
