<?php

namespace App\Http\Controllers\Frontend;

use App\Models\QuotationTaskCardItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\QuotationTaskCardItemStore;
use App\Http\Requests\Frontend\QuotationTaskCardItemUpdate;

class QuotationTaskCardItemController extends Controller
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
     * @param  \App\Http\Requests\Frontend\QuotationTaskCardItemStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuotationTaskCardItemStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuotationTaskCardItem  $quotationTaskCardItem
     * @return \Illuminate\Http\Response
     */
    public function show(QuotationTaskCardItem $quotationTaskCardItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuotationTaskCardItem  $quotationTaskCardItem
     * @return \Illuminate\Http\Response
     */
    public function edit(QuotationTaskCardItem $quotationTaskCardItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\QuotationTaskCardItemUpdate  $request
     * @param  \App\Models\QuotationTaskCardItem  $quotationTaskCardItem
     * @return \Illuminate\Http\Response
     */
    public function update(QuotationTaskCardItemUpdate $request, QuotationTaskCardItem $quotationTaskCardItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuotationTaskCardItem  $quotationTaskCardItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuotationTaskCardItem $quotationTaskCardItem)
    {
        //
    }
}
