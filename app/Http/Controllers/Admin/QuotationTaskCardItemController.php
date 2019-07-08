<?php

namespace App\Http\Controllers\Admin;

use App\Models\QuotationTaskCardItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuotationTaskCardItemStore;
use App\Http\Requests\Admin\QuotationTaskCardItemUpdate;

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
     * @param  \App\Http\Requests\Admin\QuotationTaskCardItemStore  $request
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
     * @param  \App\Http\Requests\Admin\QuotationTaskCardItemUpdate  $request
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
