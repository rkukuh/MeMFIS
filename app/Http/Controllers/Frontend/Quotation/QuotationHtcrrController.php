<?php

namespace App\Http\Controllers\frontend\Quotation;

use App\Models\Quotation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuotationHtcrrController extends Controller
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
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param   \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation  $quotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param   \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation)
    {
        return view('frontend.quotation.htcrr.index',[
            'quotation' => $quotation
        ]);
    }

    /**
     * Update the data_htcrr for "workpackage" resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation)
    {
        if(empty($quotation->data_htcrr)){
            $data_json = [];
            $data_json["description"] = $request->description;
            $data_json["manhour_rate_amount"] = $request->manhour_rate;
            $data_json["total_manhours_with_performance_factor"] = $request->manhour_total;

            $data_json = json_encode($data_json, true);
            $quotation->update(['data_htcrr' => $data_json]);
        }else{
            $data_json = json_decode($quotation->data_htcrr, true);
            $data_json["description"] = $request->description;
            $data_json["manhour_rate_amount"] = $request->manhour_rate;
            $data_json["total_manhours_with_performance_factor"] = $request->manhour_total;

            $data_json = json_encode($data_json, true);
            $quotation->update(['data_htcrr' => $data_json]);
        }

        return response()->json($data_json);
    }

    /**
     * Update the data_htcrr for "discount" resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function discount(Request $request, Quotation $quotation)
    {
        if(empty($quotation->data_htcrr)){
            $data_json = [];
            $data_json["discount_value"] = $request->discount_value;
            $data_json["discount_type"] = $request->discount_type;

            $data_json = json_encode($data_json, true);
            $quotation->update(['data_htcrr' => $data_json]);
        }else{
            $data_json = json_decode($quotation->data_htcrr, true);
            $data_json["discount_value"] = $request->discount_value;
            $data_json["discount_type"] = $request->discount_type;

            $data_json = json_encode($data_json, true);
            $quotation->update(['data_htcrr' => $data_json]);
        }

        return response()->json($data_json);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param   \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation  $quotation)
    {
        //
    }
}
