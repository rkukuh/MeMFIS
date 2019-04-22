<?php

namespace App\Http\Controllers\Frontend\PurchaseOrder;

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
        $purchase_request_id = PurchaseRequest::where('uuid',$request->purchase_request_id)->first()->id;
        $ordered_at = Carbon::parse($request->ordered_at);
        $valid_until = Carbon::parse($request->valid_until);
        $ship_at = Carbon::parse($request->ship_at);
        $top_start_at = Carbon::parse($request->top_start_at);
        $top_type = Type::where('code',$request->top_type)->first()->id;

        $request->merge(['purchase_request_id' => $purchase_request_id]);
        $request->merge(['ordered_at' => $ordered_at]);
        $request->merge(['valid_until' => $valid_until]);
        $request->merge(['ship_at' => $ship_at]);
        $request->merge(['top_start_at' => $top_start_at]);
        $request->merge(['top_type' => $top_type]);

        $purchaseOrder = PurchaseOrder::create($request->all());

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
