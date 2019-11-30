<?php

namespace App\Http\Controllers\Frontend\Workshop;

use App\Models\Workshop;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\WorkshopStore;
use App\Http\Requests\Frontend\WorkshopUpdate;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.quotation-workshop.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.quotation-workshop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkshopStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkshopStore $request)
    {
        $contact = $scheduled_payment_amount = [];

        $contact['name']     = $request->attention_name;
        $contact['phone'] = $request->attention_phone;
        $contact['address'] = $request->attention_address;
        $contact['fax'] = $request->attention_fax;
        $contact['email'] = $request->attention_email;

        $request->merge(['number' => DocumentNumber::generate('QWOR-', Quotation::withTrashed()->count() + 1)]);
        $request->merge(['attention' => json_encode($contact)]);
        $request->merge(['quotationable_type' => 'App\Models\Workshop']);
        $request->merge(['scheduled_payment_type' => Type::ofScheduledPayment('code', 'by-progress')->first()->id]);
        $request->merge(['scheduled_payment_amount' => json_encode($scheduled_payment_amount)]);
        $request->merge(['quotationable_id' => Project::where('uuid', $request->project_id)->first()->id]);

        $quotation = Quotation::create($request->all());
        
        return response()->json($quotation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function show(Workshop $workshop)
    {
        return view('frontend.quotation-workshop.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function edit(Workshop $workshop)
    {
        return view('frontend.quotation-workshop.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkshopUpdate  $request
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function update(WorkshopUpdate $request, Workshop $workshop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Workshop $workshop)
    {
        //
    }
}