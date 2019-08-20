<?php

namespace App\Http\Controllers\Frontend\Quotation;

use App\Models\QuotationWorkPackageTaskCardItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\QuotationWorkPackageTaskCardItemStore;
use App\Http\Requests\Frontend\QuotationWorkPackageTaskCardItemUpdate;

class QuotationWorkPackageTaskCardItemController extends Controller
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
     * @param  \App\Http\Requests\Frontend\QuotationWorkPackageTaskCardItemStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuotationWorkPackageTaskCardItemStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuotationWorkPackageTaskCardItem  $quotationWorkPackageTaskCardItem
     * @return \Illuminate\Http\Response
     */
    public function show(QuotationWorkPackageTaskCardItem $quotationWorkPackageTaskCardItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuotationWorkPackageTaskCardItem  $quotationWorkPackageTaskCardItem
     * @return \Illuminate\Http\Response
     */
    public function edit(QuotationWorkPackageTaskCardItem $qtn_wp_tc_item)
    {
        return response()->json($qtn_wp_tc_item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\QuotationWorkPackageTaskCardItemUpdate  $request
     * @param  \App\Models\QuotationWorkPackageTaskCardItem  $quotationWorkPackageTaskCardItem
     * @return \Illuminate\Http\Response
     */
    public function update(QuotationWorkPackageTaskCardItemUpdate $request, QuotationWorkPackageTaskCardItem $qtn_wp_tc_item)
    {
        $request->merge(['subtotal' => $request->quantity*$request->price_amount]);

        $qtn_wp_tc_item->update($request->all());

        return response()->json($qtn_wp_tc_item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuotationWorkPackageTaskCardItem  $quotationWorkPackageTaskCardItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuotationWorkPackageTaskCardItem $quotationWorkPackageTaskCardItem)
    {
        //
    }
}
