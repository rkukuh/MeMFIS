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
        // dump($row['um']);
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

        /** Set the category */

        switch ($row['categories']) {
            case 'CONSUMABLE':
                $category = Category::ofItem()
                                    ->where('name', 'Consumable')->first()->id;
                break;
            case 'RAWMAT':
                $category = Category::ofItem()
                                    ->where('name', 'Raw Material')->first()->id;
                break;
            case 'RAW MATERIAL':
                $category = Category::ofItem()
                                    ->where('name', 'Raw Material')->first()->id;
                break;
            case 'TOOLS':
                $category = Category::ofItem()
                                    ->where('name', 'Tool')->first()->id;
                break;
            case 'TOOL':
            $category = Category::ofItem()
                                ->where('name', 'Tool')->first()->id;
                break;
            case 'COMP':
                $category = Category::ofItem()
                                    ->where('name', 'Component')->first()->id;
                break;
            case 'BDP':
                $category = Category::ofItem()
                                    ->where('name', 'Consumable')->first()->id;
                break;
            default:
                $category = Category::ofItem()
                                    ->where('name', 'Consumable')->first()->id;
        }

        $item = new Item([
            'code'      => $row['material'],
            'name'      => $row['material_description'],
            'unit_id'   => $unit,
            'is_stock'  => true,
        ]);

        $item->save();

        for($i=1;$i<=5;$i++){
            $item->prices()
            ->save(new Price (['amount' =>0,'level' =>$i]));
        }

        $item->categories()->sync($category);
    }
}
