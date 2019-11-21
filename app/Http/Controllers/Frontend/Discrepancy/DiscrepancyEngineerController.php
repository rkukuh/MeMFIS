<?php

namespace App\Http\Controllers\Frontend\Discrepancy;

use Auth;
use Validator;
use App\Models\Zone;
use App\Models\Type;
use App\Models\JobCard;
use App\Models\Approval;
use App\Models\Employee;
use App\Models\DefectCard;
use Illuminate\Http\Request;
use App\Helpers\DocumentNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\DiscrepancyStore;
use App\Http\Requests\Frontend\DiscrepancyUpdate;


class DiscrepancyEngineerController extends Controller
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
    public function store(DiscrepancyStore $request)
    {
        $zone = json_decode($request->zone);
        $helpers = json_decode($request->helper_array);
        $zones = [];

        $request->merge(['code' => DocumentNumber::generate('JDEF-', DefectCard::withTrashed()->count()+1)]);
        $request->merge(['jobcard_id' => JobCard::where('uuid',$request->jobcard_id)->first()->id]);
        $request->merge(['engineer_quantity' => 1]);
        $request->merge(['helper_quantity' => sizeof($helpers)]);
        $defectcard = DefectCard::create($request->all());

        foreach($helpers as $helper){
            $employee = Employee::where('code', $helper[0])->first();
            $defectcard->helpers()->attach($employee->id, ['additionals' => $helper[2]]);
        }

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

            $defectcard->zones()->attach($zones);

        }

        if(Type::where('id',$request->skill_id)->where('of','taskcard-skill')->first()->code == 'eri'){
            $defectcard->skills()->attach(Type::where('code','electrical')->first()->id);
            $defectcard->skills()->attach(Type::where('code','radio')->first()->id);
            $defectcard->skills()->attach(Type::where('code','instrument')->first()->id);
        }
        else{
            $defectcard->skills()->attach($request->skill_id);
        }

        if($request->propose){
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
        }

        $defectcard->approvals()->save(new Approval([
            'approvable_id' => $defectcard->id,
            'conducted_by' => Auth::id(),
            'is_approved' => 1
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

        return view('frontend.discrepancy.engineer.show', [
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

        return view('frontend.discrepancy.engineer.edit', [
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
    public function update(DiscrepancyUpdate $request,DefectCard $discrepancy)
    {
        $zone = json_decode($request->zone);
        $zones = [];
        $jobcard = JobCard::find($request->jobcard_id);
        if(empty($jobcard)){
            $jobcard = JobCard::where('uuid', $request->jobcard_id)->first();
        }
        $request->merge(['jobcard_id' => $jobcard->id]);

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

        if(Type::where('id',$request->skill_id)->first()->code == 'eri'){
            $discrepancy->skills()->detach();
            $discrepancy->skills()->attach(Type::where('code','electrical')->first()->id);
            $discrepancy->skills()->attach(Type::where('code','radio')->first()->id);
            $discrepancy->skills()->attach(Type::where('code','instrument')->first()->id);
        }
        else{
            if(sizeof($discrepancy->skills) > 1 ){
                $discrepancy->skills()->detach();
            }
            $discrepancy->skills()->sync($request->skill_id);
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

        // in case updated again , sehingga approvals jumlahnya sesuai
        if(sizeof($discrepancy->approvals) == 0){
            $discrepancy->approvals()->save(new Approval([
                'approvable_id' => $discrepancy->id,
                'conducted_by' => Auth::id(),
                'is_approved' => 1
            ]));
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

        return response()->json($discrepancy);
    }


    /**
     * Search the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'code' => 'required|exists:defectcards,code'
          ]);

          if ($validator->fails()) {
            return
            redirect()->route('frontend.defectcard-engineer.index')->withErrors($validator)->withInput();
          }

        $search = DefectCard::where('code',$request->code)->first();

        return redirect()->route('frontend.discrepancy-engineer.edit',$search->uuid);
    }
}
