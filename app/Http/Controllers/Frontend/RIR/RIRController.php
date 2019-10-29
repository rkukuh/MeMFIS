<?php

namespace App\Http\Controllers\Frontend\RIR;

use Auth;
use App\Models\RIR;
use App\Models\Status;
use App\Models\Vendor;
use App\Models\Approval;
use App\Models\PurchaseOrder;
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
        $request->merge(['number' => DocumentNumber::generate('RIR-', RIR::withTrashed()->count()+1)]);
        $request->merge(['vendor_id' => Vendor::where('uuid',$request->vendor)->first()->id]);
        $request->merge(['purchase_order_id' => PurchaseOrder::where('uuid',$request->purchase_order)->first()->id]);
        $request->merge(['status_id' => Status::ofRIR()->where('code',$request->status)->first()->id]);
        $rir = RIR::create($request->all());

        return response()->json($rir);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RIR  $rir
     * @return \Illuminate\Http\Response
     */
    public function show(RIR $rir)
    {
        return view('frontend.rir.show', [
            'receivingInspectionReport' => $rir
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RIR  $rir
     * @return \Illuminate\Http\Response
     */
    public function edit(RIR $rir)
    {
        return view('frontend.rir.edit', [
            'receivingInspectionReport' => $rir,
            'rir_status' => Status::find($rir->status_id)->code,
            'vendors' => Vendor::all(),
            'vendor_uuid' => Vendor::find($rir->vendor_id)->uuid
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\RIRUpdate  $request
     * @param  \App\Models\RIR  $rir
     * @return \Illuminate\Http\Response
     */
    public function update(RIRUpdate $request, RIR $rir)
    {
        dd($request->all());
        $request->merge(['number' => DocumentNumber::generate('RIR-', ReceivingInspectionReport::withTrashed()->count()+1)]);
        $request->merge(['vendor' => Vendor::where('uuid',$request->vendor)->first()->id]);
        $rir->update($request->all());


        if(sizeOf($request->general_document) <> 0){
            foreach($request->general_document as $general_document){
                $rir->general_document()->sync($general_document);
            }
        }

        if(sizeOf($request->technical_document) <> 0){
            foreach($request->technical_document as $technical_document){
                $rir->technical_document()->sync($technical_document);
            }
        }

        return response()->json($rir);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RIR  $rir
     * @return \Illuminate\Http\Response
     */
    public function destroy(RIR $rir)
    {
        $rir->delete();

        return response()->json($rir);
    }

    /**
     * Approve the specified resource from storage.
     *
     * @param  \App\Models\ReceivingInspectionReport  $rir
     * @return \Illuminate\Http\Response
     */
    public function approve(ReceivingInspectionReport $rir)
    {
        $rir->approvals()->save(new Approval([
            'approvable_id' => $rir->id,
            'conducted_by' => Auth::id(),
            'is_approved' => 1
        ]));

        return response()->json($rir);
    }
}
