<?php

namespace App\Observers;

use App\Models\Approval;

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
                ]);

                foreach($approval->approvable->items as $item){
                    $inv_in->items()->attach($item->pivot->item_id, [
                        'quantity' => $item->pivot->quantity,
                        'note' => $item->pivot->note,
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
