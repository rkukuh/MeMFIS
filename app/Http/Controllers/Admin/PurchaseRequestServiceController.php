<?php

namespace App\Http\Controllers\Admin;

use App\Models\PurchaseRequestService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PurchaseRequestServiceStore;
use App\Http\Requests\Admin\PurchaseRequestServiceUpdate;

class PurchaseRequestServiceController extends Controller
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
     * @param  \App\Http\Requests\Admin\PurchaseRequestServiceStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseRequestServiceStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseRequestService  $purchaseRequestService
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseRequestService $purchaseRequestService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseRequestService  $purchaseRequestService
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseRequestService $purchaseRequestService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\PurchaseRequestServiceUpdate  $request
     * @param  \App\Models\PurchaseRequestService  $purchaseRequestService
     * @return \Illuminate\Http\Response
     */
    public function update(PurchaseRequestServiceUpdate $request, PurchaseRequestService $purchaseRequestService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseRequestService  $purchaseRequestService
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseRequestService $purchaseRequestService)
    {
        //
    }
}
