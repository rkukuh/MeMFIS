<?php

namespace App\Http\Controllers\Admin;

use App\Models\PurchaseOrderItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PurchaseOrderItemStore;
use App\Http\Requests\Admin\PurchaseOrderItemUpdate;

class PurchaseOrderItemController extends Controller
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
     * @param  \App\Http\Requests\Admin\PurchaseOrderItemStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseOrderItemStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseOrderItem  $purchaseOrderItem
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrderItem $purchaseOrderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseOrderItem  $purchaseOrderItem
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrderItem $purchaseOrderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\PurchaseOrderItemUpdate  $request
     * @param  \App\Models\PurchaseOrderItem  $purchaseOrderItem
     * @return \Illuminate\Http\Response
     */
    public function update(PurchaseOrderItemUpdate $request, PurchaseOrderItem $purchaseOrderItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrderItem  $purchaseOrderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrderItem $purchaseOrderItem)
    {
        //
    }
}
