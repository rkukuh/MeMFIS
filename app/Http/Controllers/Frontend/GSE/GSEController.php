<?php

namespace App\Http\Controllers\Frontend\GSE;

use Carbon\Carbon;
use App\Models\GSE;
use App\Models\Employee;
use App\Models\ItemRequest;
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
        return view('frontend.gse.index');
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
        $request->merge(['number' => DocumentNumber::generate('GSE-', GSE::withTrashed()->count()+1)]);
        $request->merge(['returned_at' => Carbon::parse($request->returned_at)]);
        $request->merge(['returned_by' => Employee::where('uuid',$request->returned_by)->first()->user->id]);
        $request->merge(['request_id' => ItemRequest::where('uuid',$request->request_id)->first()->id]);
        $GroundSupportEquiptmentStore = GSE::create($request->all());

        return response()->json($GroundSupportEquiptmentStore);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GSE  $gse
     * @return \Illuminate\Http\Response
     */
    public function show(GSE $gse)
    {
        $type =  $gse->request->requestable_type;

        if($type == 'App\Models\JobCard'){
            return view('frontend.gse.hm.show', [
            'groundSupportEquiptment' => $gse]);
        }
        else if($type == 'App\Models\DefectCard'){
            return view('frontend.gse.defectcard.show', [
            'groundSupportEquiptment' => $gse]);
        }
        else if($type == 'App\Models\Workshop'){
            return view('frontend.gse.workshop.show', [
            'groundSupportEquiptment' => $gse]);
        }
        else if($type == 'App\Models\InventoryOut'){
            return view('frontend.gse.inventory-out.show', [
            'groundSupportEquiptment' => $gse]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GSE  $gse
     * @return \Illuminate\Http\Response
     */
    public function edit(GSE $gse)
    {
        $type =  $gse->request->requestable_type;

        if($type == 'App\Models\JobCard'){
            return view('frontend.gse.hm.edit', [
            'groundSupportEquiptment' => $gse]);
        }
        else if($type == 'App\Models\DefectCard'){
            return view('frontend.gse.defectcard.edit', [
            'groundSupportEquiptment' => $gse]);
        }
        else if($type == 'App\Models\Workshop'){
            return view('frontend.gse.workshop.edit', [
            'groundSupportEquiptment' => $gse]);
        }
        else if($type == 'App\Models\InventoryOut'){
            return view('frontend.gse.inventory-out.edit', [
            'groundSupportEquiptment' => $gse]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\GSEUpdate  $request
     * @param  \App\Models\GSE  $gse
     * @return \Illuminate\Http\Response
     */
    public function update(GSEUpdate $request, GSE $gse)
    {
        dd($request->all());
        $request->merge(['number' => DocumentNumber::generate('GSE-', ReceivingInspectionReport::withTrashed()->count()+1)]);
        $groundSupportEquiptment->update($request->all());

        return response()->json($groundSupportEquiptment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GSE  $gse
     * @return \Illuminate\Http\Response
     */
    public function destroy(GSE $gse)
    {
        $groundSupportEquiptment->delete();

        return response()->json($groundSupportEquiptment);
    }
}
