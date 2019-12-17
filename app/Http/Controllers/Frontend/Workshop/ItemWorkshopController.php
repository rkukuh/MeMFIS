<?php

namespace App\Http\Controllers\Frontend\Workshop;

use App\Models\Workshop;
use App\Models\Quotation;
use App\Models\Type;
use App\Models\Project;
use App\Models\Currency;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\WorkshopStore;
use App\Http\Requests\Frontend\WorkshopUpdate;
use App\Helpers\DocumentNumber;

class ItemWorkshopController extends Controller
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
    public function create(Quotation $quotation)
    {
        return view('frontend.quotation-workshop.item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\WorkshopStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WorkshopStore $request)
    {
        // $contact = $scheduled_payment_amount = [];

        // $contact['name']     = $request->attention_name;
        // $contact['phone'] = $request->attention_phone;
        // $contact['address'] = $request->attention_address;
        // $contact['fax'] = $request->attention_fax;
        // $contact['email'] = $request->attention_email;

        // $request->merge(['number' => DocumentNumber::generate('QWOR-', Quotation::withTrashed()->whereYear('created_at', date("Y"))->count()+1)]);
        // $request->merge(['attention' => json_encode($contact)]);
        // $request->merge(['quotationable_type' => 'App\Models\Project']);
        // $request->merge(['scheduled_payment_type' => Type::ofScheduledPayment('code', 'by-progress')->first()->id]);
        // $request->merge(['scheduled_payment_amount' => json_encode($scheduled_payment_amount)]);
        // $request->merge(['quotationable_id' => Project::where('uuid', $request->project_id)->first()->id]);

        // $quotation = Quotation::create($request->all());

        // return response()->json($quotation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function show(Workshop $workshop)
    {
        return view('frontend.quotation-workshop.item.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation)
    {
        $projects = Project::get();
        $scheduled_payment_amount = json_decode($quotation->scheduled_payment_amount);
        $charges = json_decode($quotation->charge);
        $currencies = Currency::all();

        return view('frontend.quotation-workshop.edit', [
            'currencies' => $currencies,
            'quotation' => $quotation,
            'charges' => $charges,
            'scheduled_payment_amount' => $scheduled_payment_amount,
            'projects' => $projects
        ]);
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
