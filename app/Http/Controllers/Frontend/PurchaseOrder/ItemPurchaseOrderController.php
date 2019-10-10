<?php

namespace App\Http\Controllers\Frontend\PurchaseOrder;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Type;
use App\Models\Vendor;
use App\Models\Currency;
use App\Models\PurchaseOrder;
use App\Models\PurchaseRequest;
use App\Helpers\DocumentNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PurchaseOrderStore;
use App\Http\Requests\Frontend\PurchaseOrderUpdate;

class ItemPurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\PurchaseOrderStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseOrderStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchaseOrder, Item $item)
    {
        return response()->json($purchaseOrder->items->where('pivot.item_id',$item->id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\PurchaseOrderUpdate  $request
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(PurchaseOrderUpdate $request, PurchaseOrder $purchaseOrder, Item $item)
    {
        $subtotal_before_discount = $request->quantity*$request->price;
        $discount_amount = 0;
        if($request->discount_type == "percentage"){
            $discount_amount = $subtotal_before_discount * ($request->discount_value / 100);
        }
        
        $purchaseOrder->items()->updateExistingPivot($item->id,
                    ['unit_id'=>$request->unit_id,
                    'quantity'=> $request->quantity,
                    'price'=> $request->price,
                    // 'tax_percent'=> $request->ppn,
                    // 'tax_amount'=> $request->ppn,
                    'subtotal_before_discount'=> $subtotal_before_discount ,
                    'discount_type'=> $request->discount_type ,
                    'discount_value'=> $request->discount_value ,
                    'subtotal_after_discount'=> $subtotal_before_discount - $discount_amount,
                    'note' => $request->note]);

        return response()->json($purchaseOrder);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchaseOrder, Item $item)
    {
        $purchaseOrder->items()->detach($item->id);

        return response()->json($purchaseOrder);
    }
}
