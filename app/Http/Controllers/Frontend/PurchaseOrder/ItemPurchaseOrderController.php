<?php

namespace App\Http\Controllers\Frontend\PurchaseOrder;

use Carbon\Carbon;
use App\Models\Item;
use App\Models\Promo;
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
        $promo_type = Promo::where('uuid',$request->promo_type)->first();
        $discount_amount = $discount_percentage = 0;
        if($promo_type->code == "discount-percent"){
            $discount_percentage = $request->promo;
            $discount_amount = $subtotal_before_discount * ($discount_percentage / 100);
        }else{
            $discount_amount = $request->promo;
            $discount_percentage = $request->promo / $subtotal_before_discount;
        }

        //todo ppn
        // $ppn = $tax_percentage = 0;
        // if($tax_type){
        //     $ppn = $subtotal_before_discount / 1.1 * 0.1;
        //     $tax_type = "include";
        //     $tax_percentage = 10;
        // }else{
        //     $ppn = $subtotal_before_discount * 0.1;
        //     $tax_type = "exclude";
        //     $tax_percentage = 10;
        // }
       

        $purchaseOrder->items()->updateExistingPivot($item->id,
                    ['unit_id'=>$request->unit_id,
                    'quantity'=> $request->quantity,
                    'price'=> $request->price,
                    'subtotal_before_discount'=> $subtotal_before_discount ,
                    'subtotal_after_discount'=> $subtotal_before_discount - $discount_amount,
                    'note' => $request->note]);

        if(sizeof($purchaseOrder->promos) > 0){
            //todo update still not working
            $purchaseOrder->promos()->sync($promo_type->id,[
                'value'     => $discount_percentage,
                'amount'    => $discount_amount
                ]);
        }else{
            $purchaseOrder->promos()->save(Promo::find($promo_type->id), [
                'value'     => $discount_percentage,
                'amount'    => $discount_amount
            ]);
        }

        // if(sizeof($purchaseOrder->taxes) > 0){
        //     $tax = Tax::where('uuid', $purchaseOrder->taxes->last()->uuid)->update([
        //         'taxable_type' => 'App\Models\PurchaseOrder',
        //         'taxable_id' => $purchaseOrder->id,
        //         'type_id' => Type::ofTax()->where('code', $request->tax_type)->first()->id,
        //         'percent' => $request->tax_percentage,
        //         'amount' => $request->ppn
        //     ]);
        // }else{
        //     $purchaseOrder->taxes()->save(new Tax(['taxable_type' => 'App\Models\PurchaseOrder',
        //         'taxable_id' => $purchaseOrder->id,
        //         'type_id' => Type::ofTax()->where('code', $request->tax_type)->first()->id,
        //         'percent' => $request->tax_percentage,
        //         'amount' => $request->ppn
        //     ]));
        // }

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
