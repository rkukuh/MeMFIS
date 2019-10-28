<?php

namespace App\Http\Controllers\Frontend\GSE;

use App\Models\GSE;
use App\Helpers\DocumentNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\GSEStore;
use App\Http\Requests\Frontend\GSEUpdate;

class GSEController extends Controller
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
    public function create($type)
    {
        if($type == 'hm'){
            return view('frontend.gse.hm.create');
        }
        else if($type == 'defectcard'){
            return view('frontend.gse.defectcard.create');
        }
        else if($type == 'workshop'){
            return view('frontend.gse.workshop.create');
        }
        else if($type == 'inventory-out'){
            return view('frontend.gse.inventory-out.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\GSEStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GSEStore $request)
    {
        dd($request->all());
        $request->merge(['number' => DocumentNumber::generate('GSE-', ReceivingInspectionReport::withTrashed()->count()+1)]);
        $GroundSupportEquiptmentStore = ReceivingInspectionReport::create($request->all());

        return response()->json($GroundSupportEquiptmentStore);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GSE  $gSE
     * @return \Illuminate\Http\Response
     */
    public function show(GSE $gSE, $item)
    {
        if($type == 'hm'){
            return view('frontend.gse.hm.show', [
            'groundSupportEquiptment' => $groundSupportEquiptment]);
        }
        else if($type == 'defectcard'){
            return view('frontend.gse.defectcard.show', [
            'groundSupportEquiptment' => $groundSupportEquiptment]);
        }
        else if($type == 'workshop'){
            return view('frontend.gse.workshop.show', [
            'groundSupportEquiptment' => $groundSupportEquiptment]);
        }
        else if($type == 'inventory-out'){
            return view('frontend.gse.inventory-out.show', [
            'groundSupportEquiptment' => $groundSupportEquiptment]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GSE  $gSE
     * @return \Illuminate\Http\Response
     */
    public function edit(GSE $gSE, $item)
    {
        if($type == 'hm'){
            return view('frontend.gse.hm.edit', [
            'groundSupportEquiptment' => $groundSupportEquiptment]);
        }
        else if($type == 'defectcard'){
            return view('frontend.gse.defectcard.edit', [
            'groundSupportEquiptment' => $groundSupportEquiptment]);
        }
        else if($type == 'workshop'){
            return view('frontend.gse.workshop.edit', [
            'groundSupportEquiptment' => $groundSupportEquiptment]);
        }
        else if($type == 'inventory-out'){
            return view('frontend.gse.inventory-out.edit', [
            'groundSupportEquiptment' => $groundSupportEquiptment]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\GSEUpdate  $request
     * @param  \App\Models\GSE  $gSE
     * @return \Illuminate\Http\Response
     */
    public function update(GSEUpdate $request, GSE $gSE)
    {
        dd($request->all());
        $request->merge(['number' => DocumentNumber::generate('GSE-', ReceivingInspectionReport::withTrashed()->count()+1)]);
        $groundSupportEquiptment->update($request->all());

        return response()->json($groundSupportEquiptment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GSE  $gSE
     * @return \Illuminate\Http\Response
     */
    public function destroy(GSE $gSE)
    {
        $groundSupportEquiptment->delete();

        return response()->json($groundSupportEquiptment);
    }
}
