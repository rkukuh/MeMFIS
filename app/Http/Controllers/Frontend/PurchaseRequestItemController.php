<?php

namespace App\Http\Controllers\Frontend;

use App\Models\PurchaseRequestItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PurchaseRequestItemStore;
use App\Http\Requests\Frontend\PurchaseRequestItemUpdate;

class PurchaseRequestItemController extends Controller
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
     * @param  \App\Http\Requests\Frontend\PurchaseRequestItemStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseRequestItemStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseRequestItem  $purchaseRequestItem
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseRequestItem $purchaseRequestItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseRequestItem  $purchaseRequestItem
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseRequestItem $purchaseRequestItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\PurchaseRequestItemUpdate  $request
     * @param  \App\Models\PurchaseRequestItem  $purchaseRequestItem
     * @return \Illuminate\Http\Response
     */
    public function update(PurchaseRequestItemUpdate $request, PurchaseRequestItem $purchaseRequestItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseRequestItem  $purchaseRequestItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseRequestItem $purchaseRequestItem)
    {
        //
    }
}
