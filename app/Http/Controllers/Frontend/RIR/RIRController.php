<?php

namespace App\Http\Controllers\Frontend\RIR;

use Auth;
use App\Models\RIR;
use App\Models\Approval;
use App\Helpers\DocumentNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RIRStore;
use App\Http\Requests\Frontend\RIRUpdate;

class RIRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.rir.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.rir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\RIRStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RIRStore $request)
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
     * @param  \App\Models\RIR  $rIR
     * @return \Illuminate\Http\Response
     */
    public function show(RIR $rIR)
    {
        return view('frontend.rir.show', [
            'receivingInspectionReport' => $receivingInspectionReport
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RIR  $rIR
     * @return \Illuminate\Http\Response
     */
    public function edit(RIR $rIR)
    {
        return view('frontend.rir.edit', [
            'receivingInspectionReport' => $receivingInspectionReport
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\RIRUpdate  $request
     * @param  \App\Models\RIR  $rIR
     * @return \Illuminate\Http\Response
     */
    public function update(RIRUpdate $request, RIR $rIR)
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
     * @param  \App\Models\RIR  $rIR
     * @return \Illuminate\Http\Response
     */
    public function destroy(RIR $rIR)
    {
        $receivingInspectionReport->delete();

        return response()->json($receivingInspectionReport);
    }

    /**
     * Approve the specified resource from storage.
     *
     * @param  \App\Models\ReceivingInspectionReport  $receivingInspectionReport
     * @return \Illuminate\Http\Response
     */
    public function approve(ReceivingInspectionReport $receivingInspectionReport)
    {
        $receivingInspectionReport->approvals()->save(new Approval([
            'approvable_id' => $receivingInspectionReport->id,
            'conducted_by' => Auth::id(),
            'is_approved' => 1
        ]));

        return response()->json($receivingInspectionReport);
    }
}
