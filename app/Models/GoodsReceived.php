<?php

namespace App\Models;

use App\MemfisModel;

class GoodsReceived extends MemfisModel
{
    protected $table = 'goods_received';

    protected $fillable = [
        'number',
        'received_by',
        'received_at',
        'vehicle_no',
        'container_no',
        'purchase_order_id',
        'storage_id',
        'description',
    ];

    protected $dates = ['received_at'];

    /*************************************** RELATIONSHIP ****************************************/

    /**
     * One-to-Many: A GRN may have one employee (to receive the item).
     *
     * This function will retrieve the employee of a GRN.
     * See: Employee's goods_receiveds() method for the inverse
     *
     * @return mixed
     */
    public function receivedBy()
    {
        return $this->belongsTo(Employee::class, 'received_by');
    }

    /**
     * One-to-Many: A GRN may have one purchase order.
     *
     * This function will retrieve the purchase order of a GRN.
     * See: PurchaseOrder's goods_receiveds() method for the inverse
     *
     * @return mixed
     */
    public function purchase_order()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    /**
     * One-to-Many: A GRN may have one storage.
     *
     * This function will retrieve the storage of a GRN.
     * See: Storage's goods_receiveds() method for the inverse
     *
     * @return mixed
     */
    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }
}
