<?php

namespace App\Http\Controllers\Frontend\PurchaseOrder;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Promo;
use App\Models\Vendor;
use App\Models\Currency;
use App\Models\PurchaseOrder;
use App\Models\Pivots\PurchaseOrderItem;
use App\Helpers\DocumentNumber;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PurchaseOrderItemStore;
use App\Http\Requests\Frontend\PurchaseOrderItemUpdate;

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
    public function store(PurchaseOrderItemStore $request)
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
    public function update(PurchaseOrderItemUpdate $request, PurchaseOrder $purchaseOrder, Item $item)
    {
        $subtotal_before_discount = $request->quantity*$request->price;
        $promo_type = Promo::where('uuid',$request->promo_type)->first();
        $discount_amount = $discount_percentage = 0;

        $item = Item::find($item->id);
        if($request->unit_id <> $item->unit_id){
            $quantity = $request->quantity;
            $qty_uom = $item->units->where('uom.unit_id',$request->unit_id)->first()->uom->quantity;
            $quantity_unit = $qty_uom*$quantity;
        }
        else{
            $quantity_unit = $request->quantity;
        }

        $purchaseOrderItem = PurchaseOrderItem::where("item_id", $item->id)->first();
        $request->merge([
            'quantity_unit' =>$quantity_unit,
            'subtotal_before_discount' => $subtotal_before_discount,
            'subtotal_after_discount' => $subtotal_before_discount - $discount_amount

        ]);
        $purchaseOrderItem->update($request->all());

        $purchaseOrder->items()->updateExistingPivot($item->id,[
                    'unit_id'=>$request->unit_id,
                    'quantity'=> $request->quantity,
                    'quantity_unit'=> $quantity_unit,
                    'price'=> $request->price,
                    'subtotal_before_discount'=> $subtotal_before_discount ,
                    'subtotal_after_discount'=> $subtotal_before_discount - $discount_amount,
                    'note' => $request->note
                ]);

        if($promo_type){
            if($promo_type->code == "discount-percent"){
                $discount_percentage = $request->promo;
                $discount_amount = $subtotal_before_discount * ($discount_percentage / 100);
            }elseif($promo_type->code == "discount-amount"){
                $discount_amount = $request->promo;
                $discount_percentage = $request->promo / $subtotal_before_discount * 100;
            }

            if(sizeof($purchaseOrderItem->promos) > 0){
                $result = DB::table('promoables')
                        ->where('promoable_type', 'App\Models\Pivots\PurchaseOrderItem')
                        ->where('promoable_id', $purchaseOrderItem->promos->first()->pivot->promoable_id)
                        ->where('promo_id', $purchaseOrderItem->promos->first()->pivot->promo_id)
                        ->update([
                            'value' => $discount_percentage,
                            'amount' => $discount_amount,
                            'promo_id' => $promo_type->id
                        ]);
            }else{
                $purchaseOrderItem->promos()->save(Promo::find($promo_type->id), [
                    'value'     => $discount_percentage,
                    'amount'    => $discount_amount
                ]);
            }
        }

        return response()->json($purchaseOrderItem);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchaseOrder, PurchaseOrderItem $item)
    {
        $purchaseOrder->items()->detach($item->id);

        return response()->json($purchaseOrder);
    }
}
