<?php

namespace App\Http\Controllers\Frontend\Quotation;

use App\Models\QuotationDefectCardItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\QuotationDefectCardItemStore;
use App\Http\Requests\Frontend\QuotationDefectCardItemUpdate;
class QuotationDefectCardItemController extends Controller
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
     * @param  \App\Http\Requests\Frontend\QuotationDefectCardItemStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuotationDefectCardItemStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuotationDefectCardItem  $quotationDefectCardItem
     * @return \Illuminate\Http\Response
     */
    public function show(QuotationDefectCardItem $quotationDefectCardItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuotationDefectCardItem  $quotationDefectCardItem
     * @return \Illuminate\Http\Response
     */
    public function edit(QuotationDefectCardItem $qtn_defectcard_item)
    {
        return response()->json($qtn_defectcard_item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\QuotationDefectCardItemUpdate  $request
     * @param  \App\Models\QuotationDefectCardItem  $quotationDefectCardItem
     * @return \Illuminate\Http\Response
     */
    public function update(QuotationDefectCardItemUpdate $request, QuotationDefectCardItem $qtn_defectcard_item)
    {
        $request->merge(['subtotal' => $request->quantity*$request->price_amount]);

        $qtn_defectcard_item->update($request->all());

        return response()->json($qtn_defectcard_item);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuotationDefectCardItem  $quotationDefectCardItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuotationDefectCardItem $quotationDefectCardItem)
    {
        //
    }
}
