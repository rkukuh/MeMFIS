<?php

namespace App\Imports;

use App\Models\Item;
use App\Models\FefoIn;
use App\Models\Storage;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FEFOINImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $item = Item::where('code',  $row['item_code'])->first();
        $storage = Storage::where('code',  $row['storage_code'])->first();
        $qty = $row['qty'];
        $price = $row['price'];
        $used_qty = $row['used_qty'];
        
        $fefoin = FefoIn::create([
            'item_id' => $item->id,
            'storage_id' => $storage->id,
            'inventoryin_id' => null,
            'fefoin_at' => Carbon::now(),
            'quantity' => $qty,
            'used_quantity' => $used_qty,
            'serial_number' => null,
            'grn_id' => null,
            'price' => $price,
            'expired_at' => Carbon::now()->addYear(1),
        ]);
    }
}
