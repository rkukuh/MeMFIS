<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\PurchaseOrder;
use App\Models\PurchaseRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PurchaseOrderStore;
use App\Http\Requests\Frontend\PurchaseOrderUpdate;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.purchase-order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.purchase-order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\PurchaseOrderStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseOrderStore $request)
    {
        $request->purchase_request_id = PurchaseRequest::where('uuid',$request->purchase_request_id)->first()->id;
        $request->ordered_at = Carbon::parse($request->ordered_at);
        $request->valid_until = Carbon::parse($request->valid_until);
        $request->ship_at = Carbon::parse($request->ship_at);
        $request->top_start_at = Carbon::parse($request->top_start_at);
        $request->top_type = Type::where('code',$request->top_type)->first()->id;


        $purchaseOrder = PurchaseOrder::create([
            'number' => $request->purchase_request_id,
            'purchase_request_id' => $request->purchase_request_id,
            'currency_id' => $request->currency_id,
            'exchange_rate' => $request->exchange_rate,
            'vendor_id' => $request->vendor_id,
            'top_type' =>$request->top_type,
            'shipping_address' => $request->shipping_address,
            'description' => $request->description,
            'top_day_amount'=> $request->top_day_amount,
            'top_start_at'=> $request->top_start_at,

            'ordered_at' => $request->ordered_at,
            'valid_until' => $request->valid_until,
            'ship_at' => $request->ship_at,
            ]);

        return response()->json($purchaseOrder);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        return view('frontend.purchase-order.show', [
            'purchaseOrder' => $purchaseOrder,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        return view('frontend.purchase-order.edit', [
            'purchaseOrder' => $purchaseOrder,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\PurchaseOrderUpdate  $request
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(PurchaseOrderUpdate $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->delete();

        return response()->json($purchaseOrder);
    }

    /**
     * Approve the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function approve(PurchaseOrder $purchaseOrder)
    {
        return response()->json($purchaseOrder);
    }
}
