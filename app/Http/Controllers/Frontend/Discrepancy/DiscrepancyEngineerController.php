<?php

namespace App\Http\Controllers\Frontend\Discrepancy;

use Auth;
use App\Models\Type;
use App\Models\Status;
use App\Models\JobCard;
use App\Models\Progress;
use App\Models\Approval;
use App\Models\DefectCard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscrepancyEngineerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.discrepancy.engineer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(JobCard $jobcard)
    {
        return view('frontend.discrepancy.engineer.create', [
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

        $defectcard->approvals()->save(new Approval([
            'approvable_id' => $defectcard->id,
            'approved_by' => Auth::id(),
        ]));

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
        return view('frontend.discrepancy.engineer.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DefectCard $discrepancy)
    {
        return view('frontend.discrepancy.engineer.edit', [
            'discrepancy' => $discrepancy,
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

        $discrepancy->approvals()->save(new Approval([
            'approvable_id' => $discrepancy->id,
            'approved_by' => Auth::id(),
        ]));

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
        $discrepancy->delete();

        return response()->json($discrepancy);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function approve(DefectCard $discrepancy)
    {
        $discrepancy->approvals()->save(new Approval([
            'approvable_id' => $discrepancy->id,
            'approved_by' => Auth::id(),
        ]));

        return response()->json($discrepancy);
    }
}
