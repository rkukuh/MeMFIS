<?php

namespace App\Http\Controllers\Frontend\RIR;

use Auth;
use App\Models\RIR;
use App\Models\Type;
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
        $request->merge(['number' => DocumentNumber::generate('RIRT-', RIR::withTrashed()->count()+1)]);
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
        if($rir->packing_type){
            $packing_type = Type::find($rir->packing_type)->code;
        }else{
            $packing_type = null;
        }
        if($rir->packing_condition){
            $packing_condition = Type::find($rir->packing_condition)->code;
        }else{
            $packing_condition = null;
        }
        if($rir->preservation_check){
            $preservation_check = Type::find($rir->preservation_check)->code;
        }else{
            $preservation_check = null;
        }
        if($rir->material_condition){
            $material_condition = Type::find($rir->material_condition)->code;
        }else{
            $material_condition = null;
        }
        if($rir->material_quality){
            $material_quality = Type::find($rir->material_quality)->code;
        }else{
            $material_quality = null;
        }
        if($rir->material_identification){
            $material_identification = Type::find($rir->material_identification)->code;
        }else{
            $material_identification = null;
        }

        $general_decument = array();
        foreach($rir->general_documents as $i => $rir1){
            $general_decument[$i] =  $rir1->code;
        }

        $technical_decument = array();
        foreach($rir->technical_documents as $i2 => $rir2){
            $technical_decument[$i2] =  $rir2->code;
        }

        return view('frontend.rir.show', [
            'receivingInspectionReport' => $rir,
            'packing_type' => $packing_type,
            'packing_condition' => $packing_condition,
            'preservation_check' => $preservation_check,
            'material_condition' => $material_condition,
            'material_quality' => $material_quality,
            'material_identification' => $material_identification,
            'general_decument' => $general_decument,
            'technical_decument' => $technical_decument
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
        if($rir->packing_type){
            $packing_type = Type::find($rir->packing_type)->code;
        }else{
            $packing_type = null;
        }
        if($rir->packing_condition){
            $packing_condition = Type::find($rir->packing_condition)->code;
        }else{
            $packing_condition = null;
        }
        if($rir->preservation_check){
            $preservation_check = Type::find($rir->preservation_check)->code;
        }else{
            $preservation_check = null;
        }
        if($rir->material_condition){
            $material_condition = Type::find($rir->material_condition)->code;
        }else{
            $material_condition = null;
        }
        if($rir->material_quality){
            $material_quality = Type::find($rir->material_quality)->code;
        }else{
            $material_quality = null;
        }
        if($rir->material_identification){
            $material_identification = Type::find($rir->material_identification)->code;
        }else{
            $material_identification = null;
        }

        $general_decument = array();
        foreach($rir->general_documents as $i => $rir1){
            $general_decument[$i] =  $rir1->code;
        }

        $technical_decument = array();
        foreach($rir->technical_documents as $i2 => $rir2){
            $technical_decument[$i2] =  $rir2->code;
        }

        return view('frontend.rir.edit', [
            'receivingInspectionReport' => $rir,
            'rir_status' => Status::find($rir->status_id)->code,
            'vendors' => Vendor::all(),
            'vendor_uuid' => Vendor::find($rir->vendor_id)->uuid,
            'packing_type' => $packing_type,
            'packing_condition' => $packing_condition,
            'preservation_check' => $preservation_check,
            'material_condition' => $material_condition,
            'material_quality' => $material_quality,
            'material_identification' => $material_identification,
            'general_decument' => $general_decument,
            'technical_decument' => $technical_decument
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
        $request->merge(['number' => DocumentNumber::generate('RIR-', RIR::withTrashed()->count()+1)]);
        $request->merge(['vendor' => Vendor::where('uuid',$request->vendor)->first()->id]);
        $request->merge(['status_id' => Status::ofRIR()->where('code',$request->status)->first()->id]);
        $request->merge(['packing_type' => Type::ofRIRPackingAndHandlingCheckType()->where('code',$request->packing_type)->first()->id]);
        $request->merge(['packing_condition' => Type::ofRIRPackingAndHandlingCheckCondition()->where('code',$request->packing_condition)->first()->id]);
        $request->merge(['preservation_check' => Type::ofRIRPreservationCheck()->where('code',$request->preservation_check)->first()->id]);
        $request->merge(['material_condition' => Type::ofRIRMaterialCheckCondition()->where('code',$request->material_condition)->first()->id]);
        $request->merge(['material_quality' => Type::ofRIRMaterialCheckQuality()->where('code',$request->material_quality)->first()->id]);
        $request->merge(['material_identification' => Type::ofRIRMaterialCheckIdentification()->where('code',$request->material_identification)->first()->id]);
        $rir->update($request->all());

        $rir->general_documents()->detach();
        $rir->technical_documents()->detach();
        // dd($request->technical_document);
        if($request->general_document){
            foreach($request->general_document as $general_document ){
                $generalDocument = Type::ofRIRGeneralDocument()->where('code',$general_document)->first()->id;
                // dump($generalDocument);
                    $rir->general_documents()->attach($generalDocument);
            }
        }
        if($request->technical_document){
            foreach($request->technical_document as $technical_document ){
                $technical_document = Type::ofRIRTechnicalDocument()->where('code',$technical_document)->first()->id;
                // dump($technical_document);
                    $rir->technical_documents()->attach($technical_document);
            }
        }

        // dd('s');


        // if(sizeOf($request->general_document) <> 0){
        //     foreach($request->general_document as $general_document){
        //         $rir->general_document()->sync($general_document);
        //     }
        // }

        // if(sizeOf($request->technical_document) <> 0){
        //     foreach($request->technical_document as $technical_document){
        //         $rir->technical_document()->sync($technical_document);
        //     }
        // }

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
