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
                    //
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
