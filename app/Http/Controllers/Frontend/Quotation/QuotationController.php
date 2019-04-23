<?php

namespace App\Http\Controllers\Frontend\Quotation;


use App\Models\Type;
use App\Models\Quotation;
use App\Models\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\QuotationStore;
use App\Http\Requests\Frontend\QuotationUpdate;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.quotation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $websites = Type::ofWebsite()->get();

        return view('frontend.quotation.create', [
            'websites' => $websites
        ]);

        // return view('frontend.quotation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\QuotationStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuotationStore $request)
    {
        $request->project_id = Project::where('uuid',$request->project_id)->first()->id;

        // $quotation = Quotation::create($request->all());

        $quotation = Quotation::create([
            'project_id' => $request->project_id,
            'customer_id' => $request->customer_id,
            'requested_at' => $request->requested_at,
            'valid_until' => $request->valid_until,
            'currency_id' => $request->currency_id,
            'exchange_rate' => $request->exchange_rate,
            'number' => $request->title,
            'total' => $request->total,
            'scheduled_payment_type' => $request->scheduled_payment_type,
            'scheduled_payment_amount' => $request->scheduled_payment_amount,
            'term_of_condition' => $request->term_and_condition,
            'description' => $request->description,
        ]);

        return response()->json($quotation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        return view('frontend.quotation.show',[
            'quotation' => $quotation,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation)
    {
        $projects = Project::get();

        return view('frontend.quotation.edit',[
            'quotation' => $quotation,
            'projects' => $projects
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\QuotationUpdate  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(QuotationUpdate $request, Quotation $quotation)
    {
        $quotation = Quotation::find($quotation);
        // $quotation->name = $request->name;
        // $quotation->save();

        return response()->json($quotation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation)
    {
        $quotation->delete();

        return response()->json($quotation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function project($project)
    {
        return response()->json($project);
    }

}
