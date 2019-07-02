<?php

namespace App\Http\Controllers\Admin;

use App\Models\QuotationWorkPackageItem;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuotationWorkPackageItemStore;
use App\Http\Requests\Admin\QuotationWorkPackageItemUpdate;

class QuotationWorkPackageItemController extends Controller
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
     * @param  \App\Http\Requests\Admin\QuotationWorkPackageItemStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuotationWorkPackageItemStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuotationWorkPackageItem  $quotationWorkPackageItem
     * @return \Illuminate\Http\Response
     */
    public function show(QuotationWorkPackageItem $quotationWorkPackageItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuotationWorkPackageItem  $quotationWorkPackageItem
     * @return \Illuminate\Http\Response
     */
    public function edit(QuotationWorkPackageItem $quotationWorkPackageItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\QuotationWorkPackageItemUpdate  $request
     * @param  \App\Models\QuotationWorkPackageItem  $quotationWorkPackageItem
     * @return \Illuminate\Http\Response
     */
    public function update(QuotationWorkPackageItemUpdate $request, QuotationWorkPackageItem $quotationWorkPackageItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuotationWorkPackageItem  $quotationWorkPackageItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuotationWorkPackageItem $quotationWorkPackageItem)
    {
        //
    }
}
