<?php

namespace App\Http\Controllers\Frontend\Discrepancy;

use Auth;
use Validator;
use App\Models\Type;
use App\Models\Status;
use App\Models\JobCard;
use App\Models\Progress;
use App\Models\Approval;
use App\Models\DefectCard;
use Illuminate\Http\Request;
use App\Helpers\DocumentNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\DiscrepancyStore;
use App\Http\Requests\Frontend\DiscrepancyUpdate;


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
    public function store(DiscrepancyStore $request)
    {
        $request->merge(['code' => DocumentNumber::generate('JDEF-', DefectCard::withTrashed()->count()+1)]);
        $request->merge(['jobcard_id' => JobCard::where('uuid',$request->jobcard_id)->first()->id]);
        $defectcard = DefectCard::create($request->all());

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
        $propose_corrections = array();
        foreach($discrepancy->propose_corrections as $i => $defectcard){
            $propose_corrections[$i] =  $defectcard->code;
        }

        $propose_correction_text = '';
        foreach($discrepancy->propose_corrections as $i => $defectcard){
            $propose_correction_text =  $defectcard->pivot->propose_correction_text;
        }

        return view('frontend.discrepancy.engineer.show', [
            'discrepancy' => $discrepancy,
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

        $skill = Type::ofTaskCardSkill()->get();

        return view('frontend.discrepancy.engineer.edit', [
            'discrepancy' => $discrepancy,
            'skills' => $skill,
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
        $request->merge(['jobcard_id' => JobCard::where('uuid',$request->jobcard_id)->first()->id]);

        $discrepancy->update($request->all());

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


    /**
     * Search the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobCard
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
