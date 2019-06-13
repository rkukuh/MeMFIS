<?php

namespace App\Http\Controllers\Frontend\Discrepancy;

use App\Models\Type;
use App\Models\JobCard;
use App\Models\DefectCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscrepancyMechanicController extends Controller
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
    public function create(JobCard $jobcard)
    {
        return view('frontend.discrepancy.mechanic.create', [
            'jobcard' => $jobcard,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['jobcard_id' => JobCard::where('uuid',$request->jobcard_id)->first()->id]);
        $defectcard = DefectCard::create($request->all());


        foreach($request->propose as $propose ){
            $propose_correction = Type::ofDefectCardProposeCorrection()->where('code',$propose)->first()->id;
            if($propose == 'other'){
                $defectcard->propose_corrections()->attach(
                    $propose_correction, [
                    'propose_correction_text' => $request->propose_correction_text,
                ]);
            }else{
                $defectcard->propose_corrections()->attach($propose_correction);
            }
        }

        return response()->json($defectcard);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DefectCard $discrepancy)
    {
        return view('frontend.discrepancy.mechanic.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DefectCard $discrepancy)
    {
        $propose_corrections = array();
        foreach($discrepancy->propose_corrections as $i => $defectcard){
            $propose_corrections[$i] =  $defectcard->code;
        }

        $propose_correction_text = '';
        foreach($discrepancy->propose_corrections as $i => $defectcard){
            $propose_correction_text =  $defectcard->pivot->propose_correction_text;
        }

        return view('frontend.discrepancy.mechanic.edit', [
            'discrepancy' => $discrepancy,
            'propose_corrections' => $propose_corrections,
            'propose_correction_text' => $propose_correction_text,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,DefectCard $discrepancy)
    {
        $request->merge(['jobcard_id' => JobCard::where('uuid',$request->jobcard_id)->first()->id]);

        $discrepancy->update($request->all());

        $discrepancy->propose_corrections()->detach();

        foreach($request->propose as $propose ){
            $propose_correction = Type::ofDefectCardProposeCorrection()->where('code',$propose)->first()->id;
            if($propose == 'other'){
                $discrepancy->propose_corrections()->attach(
                    $propose_correction, [
                    'propose_correction_text' => $request->propose_correction_text,
                ]);
            }else{
                $discrepancy->propose_corrections()->attach($propose_correction);
            }
        }
        return response()->json($discrepancy);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DefectCard $discrepancy)
    {
        //
    }
}
