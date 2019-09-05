<?php

namespace App\Http\Controllers\Frontend\PurchaseRequest;

use Auth;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\Type;
use App\Models\Approval;
use App\Helpers\DocumentNumber;
use App\Models\PurchaseRequest;
use App\Http\Controllers\Controller;
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
        // dd($request->all());
        // if($request->unit_id == "".$item->unit_id.""){

        // }
        // else{
        //     // if($qty_uom2 = $item->units->where('uom.unit_id',$request->unit_id)->first() == null){
        //     //     $validator->errors()->add('quantity', 'UOM have not Declared');
        //     // }
        //     $qty_uom2 = $item->units->where('uom.unit_id',$request->unit_id)->first();
        // }
        $purchaseRequest->items()->attach($item->id, [
            'quantity' => $request->quantity,
            'unit_id' => $request->unit_id,
            'quantity_unit' => $request->unit_id,
            'note' => $request->remark
        ]);

        return response()->json($purchaseRequest);
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
    public function edit(PurchaseRequest $purchaseRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemGeneralPurchaseRequestUpdate  $request
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function updateGeneral(ItemGeneralPurchaseRequestUpdate $request, PurchaseRequest $purchaseRequest, Item $item)
    {
        $purchaseRequest->items()->updateExistingPivot($item->id, [ 'unit_id'=>$request->unit_id, 'quantity'=> $request->quantity, 'note' => $request->note]);

        return response()->json($purchaseRequest);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemProjectPurchaseRequestUpdate  $request
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function updateProject(ItemProjectPurchaseRequestUpdate $request, PurchaseRequest $purchaseRequest, Item $item)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseRequest $purchaseRequest,Item $item)
    {
        $purchaseRequest->items()->detach($item->id);

        return response()->json($purchaseRequest);

    }
}
