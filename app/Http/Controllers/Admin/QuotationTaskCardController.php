<?php

namespace App\Http\Controllers\Admin;

use App\Models\QuotationTaskCard;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuotationTaskCardStore;
use App\Http\Requests\Admin\QuotationTaskCardUpdate;

class QuotationTaskCardController extends Controller
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
     * @param  \App\Http\Requests\Admin\QuotationTaskCardStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuotationTaskCardStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QuotationTaskCard  $quotationTaskCard
     * @return \Illuminate\Http\Response
     */
    public function show(QuotationTaskCard $quotationTaskCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuotationTaskCard  $quotationTaskCard
     * @return \Illuminate\Http\Response
     */
    public function edit(QuotationTaskCard $quotationTaskCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\QuotationTaskCardUpdate  $request
     * @param  \App\Models\QuotationTaskCard  $quotationTaskCard
     * @return \Illuminate\Http\Response
     */
    public function update(QuotationTaskCardUpdate $request, QuotationTaskCard $quotationTaskCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QuotationTaskCard  $quotationTaskCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuotationTaskCard $quotationTaskCard)
    {
        //
    }
}
