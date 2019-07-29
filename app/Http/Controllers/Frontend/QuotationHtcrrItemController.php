<?php

namespace App\Http\Controllers\Frontend;

use App\Models\QuotationHtcrrItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\QuotationHtcrrItemStore;
use App\Http\Requests\Frontend\QuotationHtcrrItemUpdate;

class QuotationHtcrrItemController extends Controller
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
     * @param  \App\Http\Requests\Frontend\QuotationHtcrrItemStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuotationHtcrrItemStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuotationHtcrrItem  $quotationHtcrrItem
     * @return \Illuminate\Http\Response
     */
    public function show(QuotationHtcrrItem $quotationHtcrrItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuotationHtcrrItem  $quotationHtcrrItem
     * @return \Illuminate\Http\Response
     */
    public function edit(QuotationHtcrrItem $qtn_htcrr_item)
    {
        return response()->json($qtn_htcrr_item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\QuotationHtcrrItemUpdate  $request
     * @param  \App\Models\QuotationHtcrrItem  $quotationHtcrrItem
     * @return \Illuminate\Http\Response
     */
    public function update(QuotationHtcrrItemUpdate $request, QuotationHtcrrItem $qtn_htcrr_item)
    {
        $request->merge(['subtotal' => $request->quantity*$request->price_amount]);

        $qtn_htcrr_item->update($request->all());

        return response()->json($qtn_htcrr_item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuotationHtcrrItem  $quotationHtcrrItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuotationHtcrrItem $quotationHtcrrItem)
    {
        //
    }
}
