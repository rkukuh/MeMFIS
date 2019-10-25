<?php

namespace App\Http\Controllers\Frontend\ReceivingInspectionReport;

use App\ReceivingInspectionReport;
use App\Helpers\DocumentNumber;
use App\Http\Requests\Frontend\ReceivingInspectionReportStore;
use App\Http\Requests\Frontend\ReceivingInspectionReportUpdate;
use App\Http\Controllers\Controller;

class ReceivingInspectionReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.receiving-inspection-report.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.receiving-inspection-report.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceivingInspectionReportStore $request)
    {
        dd($request->all());
        $request->merge(['number' => DocumentNumber::generate('RIR-', ReceivingInspectionReport::withTrashed()->count()+1)]);
        $request->merge(['vendor' => Vendor::where('uuid',$request->vendor)->first()->id]);
        $receivingInspectionReport = ReceivingInspectionReport::create($request->all());

        if(sizeOf($request->general_document) <> 0){
            foreach($request->general_document as $general_document){
                $receivingInspectionReport->general_document()->attach($general_document);
            }
        }

        if(sizeOf($request->technical_document) <> 0){
            foreach($request->technical_document as $technical_document){
                $receivingInspectionReport->technical_document()->attach($technical_document);
            }
        }

        return response()->json($receivingInspectionReport);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ReceivingInspectionReport  $receivingInspectionReport
     * @return \Illuminate\Http\Response
     */
    public function show(ReceivingInspectionReport $receivingInspectionReport)
    {
        return view('frontend.receiving-inspection-report.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ReceivingInspectionReport  $receivingInspectionReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ReceivingInspectionReport $receivingInspectionReport)
    {
        return view('frontend.receiving-inspection-report.edit', [
            'goodsReceived' => $receivingInspectionReport,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ReceivingInspectionReport  $receivingInspectionReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReceivingInspectionReport $receivingInspectionReport)
    {
        dd($request->all());
        $request->merge(['number' => DocumentNumber::generate('RIR-', ReceivingInspectionReport::withTrashed()->count()+1)]);
        $request->merge(['vendor' => Vendor::where('uuid',$request->vendor)->first()->id]);
        $receivingInspectionReport->update($request->all());


        if(sizeOf($request->general_document) <> 0){
            foreach($request->general_document as $general_document){
                $receivingInspectionReport->general_document()->sync($general_document);
            }
        }

        if(sizeOf($request->technical_document) <> 0){
            foreach($request->technical_document as $technical_document){
                $receivingInspectionReport->technical_document()->sync($technical_document);
            }
        }

        return response()->json($receivingInspectionReport);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ReceivingInspectionReport  $receivingInspectionReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReceivingInspectionReport $receivingInspectionReport)
    {
        $receivingInspectionReport->delete();

        return response()->json($receivingInspectionReport);
    }
}
