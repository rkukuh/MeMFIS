<?php

namespace App\Http\Controllers\Frontend\Discrepancy;

use Auth;
use App\Models\Zone;
use App\Models\Type;
use App\Models\Status;
use App\Models\JobCard;
use App\Models\Approval;
use App\Models\Progress;
use App\Models\DefectCard;use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscrepancyPPCController extends Controller
{
    protected $zones;

    public function __construct()
    {
        $this->zones = Zone::get();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.discrepancy.ppc.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.discrepancy.ppc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return response()->json($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DefectCard $discrepancy)
    {
        $propose_corrections = array();
        foreach($discrepancy->propose_corrections as $i => $defectcard){
            $propose_corrections[$i] =  $defectcard->code;
        }

        $propose_correction_text = '';
        foreach($discrepancy->propose_corrections as $i => $defectcard){
            $propose_correction_text =  $defectcard->pivot->propose_correction_text;
        }

        foreach($discrepancy->zones as $i => $zone_taskcard){
            $zone_discrepancies[$i] =  $zone_taskcard->id;
        }

        return view('frontend.discrepancy.ppc.show', [
            'discrepancy' => $discrepancy,
            'zones' => $this->zones,
            'zone_discrepancies' => $zone_discrepancies,
            'propose_corrections' => $propose_corrections,
            'propose_correction_text' => $propose_correction_text,
        ]);

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

        foreach($discrepancy->zones as $i => $zone_taskcard){
            $zone_discrepancies[$i] =  $zone_taskcard->id;
        }

        $skill = Type::ofTaskCardSkill()->get();

        return view('frontend.discrepancy.ppc.edit', [
            'discrepancy' => $discrepancy,
            'skills' => $skill,
            'zones' => $this->zones,
            'zone_discrepancies' => $zone_discrepancies,
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
        $zone = json_decode($request->zone);
        $zones = [];

        $request->merge(['jobcard_id' => JobCard::where('uuid',$request->jobcard_id)->first()->id]);

        $discrepancy->update($request->all());

        if($zone){
            foreach ($zone as $zone_name ) {
                if(isset($zone_name)){
                    $airplane = JobCard::find($request->jobcard_id)->quotation->quotationable->aircraft->id;
                    $zone = Zone::firstOrCreate(
                        ['name' => $zone_name, 'zoneable_id' => $airplane, 'zoneable_type' => 'App\Models\Aircraft']
                    );
                    array_push($zones, $zone->id);
                }
            }

            $discrepancy->zones()->sync($zones);

        }

        $discrepancy->propose_corrections()->detach();

        if($request->propose){
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
        }

        // $discrepancy->approvals()->save(new Approval([
        //     'approvable_id' => $discrepancy->id,
        //     'conducted_by' => Auth::id(),
        //     'is_approved' => 1
        // ]));

        // $discrepancy->progresses()->save(new Progress([
        //     'status_id' =>  Status::ofDefectcard()->where('code','open')->first()->id,
        //     'progressed_by' => Auth::id()
        // ]));

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
            'conducted_by' => Auth::id(),
            'is_approved' => 1
        ]));

        $discrepancy->progresses()->save(new Progress([
            'status_id' =>  Status::ofDefectcard()->where('code','open')->first()->id,
            'progressed_by' => Auth::id()
        ]));


        return response()->json($discrepancy);
    }
}
