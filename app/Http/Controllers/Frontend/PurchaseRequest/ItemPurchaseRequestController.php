<?php

namespace App\Http\Controllers\Frontend\PurchaseRequest;

use Auth;
use Carbon\Carbon;
use App\Models\Unit;
use App\Models\Item;
use App\Models\Type;
use App\Models\Approval;
use App\Helpers\DocumentNumber;
use App\Models\PurchaseRequest;
use App\Http\Controllers\Controller;
use App\Models\Pivots\PurchaseRequestItem;
use App\Http\Requests\Frontend\ItemPurchaseRequestStore;
use App\Http\Requests\Frontend\ItemGeneralPurchaseRequestUpdate;
use App\Http\Requests\Frontend\ItemProjectPurchaseRequestUpdate;

class ItemPurchaseRequestController extends Controller
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
     * @param  \App\Http\Requests\Frontend\ItemPurchaseRequestStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemPurchaseRequestStore $request,PurchaseRequest $purchaseRequest,Item $item)
    {
        $request->merge(['unit_id' =>  Unit::where('uuid',$request->unit_id)->first()->id]);
        $exists = PurchaseRequestItem::where('purchase_request_id',$purchaseRequest->id)->where('item_id',$item->id)->first();
        if($exists){
            return response()->json(['title' => "Danger"]);
        }else{
            $item = Item::find($item->id);
            if($request->unit_id <> $item->unit_id){
                $quantity = $request->quantity;
                $qty_uom = $item->units->where('uom.unit_id',$request->unit_id)->first()->uom->quantity;
                $quantity_unit = $qty_uom*$quantity;
            }
            else{
                $quantity_unit = $request->quantity;
            }
            $purchaseRequest->items()->attach($item->id, [
                'quantity' => $request->quantity,
                'unit_id' => $request->unit_id,
                'quantity_unit' => $quantity_unit,
                'note' => $request->remark
            ]);

            return response()->json($purchaseRequest);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseRequest $purchaseRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseRequest $purchaseRequest, $item)
    {
        $item = Item::find($item);

        return response()->json($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemGeneralPurchaseRequestUpdate  $request
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function updateGeneral(ItemGeneralPurchaseRequestUpdate $request, $item)
    {
        $purchaseRequest = PurchaseRequestItem::find($item);
        $request->merge(['item_id' =>  Item::where('uuid',$request->item_id)->first()->id]);

        $purchaseRequest->update($request->all());

        return response()->json($purchaseRequest);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemProjectPurchaseRequestUpdate  $request
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function updateProject(ItemProjectPurchaseRequestUpdate $request, $item)
    {
        $purchaseRequest = PurchaseRequestItem::find($item);

        $purchaseRequest->update($request->all());

        return response()->json($purchaseRequest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy($item)
    {
        $purchaseRequest = PurchaseRequestItem::find($item)->delete();

        return response()->json($purchaseRequest);

    }
}
