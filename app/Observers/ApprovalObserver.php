<?php

namespace App\Observers;

use App\Models\FefoIn;
use App\Models\Approval;
use App\Models\InventoryIn;
use App\Helpers\DocumentNumber;

class ApprovalObserver
{
    /**
     * Handle the approval "created" event.
     *
     * @param  \App\Models\Approval  $approval
     * @return void
     */
    public function created(Approval $approval)
    {
        switch ($approval->approvable_type) {
            case 'App\Models\GoodsReceived':
                $inv_in = $approval->approvable->inventoryin()->create([
                    'storage_id' => $approval->approvable->storage_id,
                    'number' => DocumentNumber::generate('INV-IN-', InventoryIn::withTrashed()->count()+1),
                    'inventoried_at' => $approval->approvable->received_at,
                ]);

                foreach($approval->approvable->items as $item){
                    $qty_uom = $item->units->where('uom.unit_id',$item->pivot->unit_id)->first()->uom->quantity;
                    $inv_in->items()->attach($item->pivot->item_id, [
                        'unit_id' => $item->pivot->unit_id,
                        'serial_number' => $item->pivot->serial_number,
                        'quantity' => $item->pivot->quantity,
                        'quantity_in_primary_unit' => $qty_uom*$item->pivot->quantity,
                        'purchased_price' => $item->pivot->price,
                        'total' => 1*$item->pivot->price,
                        'description' => $item->pivot->note,
                    ]);

                    FefoIn::create([
                        'inventoryin_id' => $inv_in->id,
                        'item_id' => $item->pivot->item_id,
                        'storage_id' =>  $approval->approvable->storage_id,
                        'fefoin_at' =>  $approval->approvable->received_at,
                        'quantity' => $qty_uom*$item->pivot->quantity,
                        'serial_number' => $item->pivot->serial_number,
                        'grn_id' => $approval->approvable->id,
                        'price' => $item->pivot->price,
                        'expired_at' => $item->pivot->expired_at,
                    ]);
                }

                break;
            case 'App\Models\InventoryIn':
                    //
                break;
            case 'App\Models\InventoryOut':
                    //
                break;
            default:
                    //
        }
    }

    /**
     * Handle the approval "updated" event.
     *
     * @param  \App\Models\Approval  $approval
     * @return void
     */
    public function updated(Approval $approval)
    {
        //
    }

    /**
     * Handle the approval "deleted" event.
     *
     * @param  \App\Models\Approval  $approval
     * @return void
     */
    public function deleted(Approval $approval)
    {
        //
    }

    /**
     * Handle the approval "restored" event.
     *
     * @param  \App\Models\Approval  $approval
     * @return void
     */
    public function restored(Approval $approval)
    {
        //
    }

    /**
     * Handle the approval "force deleted" event.
     *
     * @param  \App\Models\Approval  $approval
     * @return void
     */
    public function forceDeleted(Approval $approval)
    {
        //
    }
}
