<?php

namespace App\Http\Controllers\Admin;

use App\Models\QuotationWorkPackage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuotationWorkPackageStore;
use App\Http\Requests\Admin\QuotationWorkPackageUpdate;

class QuotationWorkPackageController extends Controller
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
     * @param  \App\Http\Requests\Admin\QuotationWorkPackageStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuotationWorkPackageStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuotationWorkPackage  $quotationWorkPackage
     * @return \Illuminate\Http\Response
     */
    public function show(QuotationWorkPackage $quotationWorkPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuotationWorkPackage  $quotationWorkPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(QuotationWorkPackage $quotationWorkPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\QuotationWorkPackageUpdate  $request
     * @param  \App\Models\QuotationWorkPackage  $quotationWorkPackage
     * @return \Illuminate\Http\Response
     */
    public function update(QuotationWorkPackageUpdate $request, QuotationWorkPackage $quotationWorkPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuotationWorkPackage  $quotationWorkPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuotationWorkPackage $quotationWorkPackage)
    {
        //
    }
}
