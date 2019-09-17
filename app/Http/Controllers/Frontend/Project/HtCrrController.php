<?php

namespace App\Http\Controllers\Frontend\Project;

use Auth;
use App\Models\Item;
use App\Models\Type;
use App\Models\HtCrr;
use App\Models\Status;
use App\Models\Project;
use App\Models\Progress;
use App\Helpers\DocumentNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\HtCrrStore;
use App\Http\Requests\Frontend\HtCrrUpdate;

class HtCrrController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\HtCrrStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HtCrrStore $request)
    {
        $number = HtCrr::withTrashed()->where('parent_id',null)->count()+1;
        $request->merge(['code' => DocumentNumber::generate('JCRI-',$number)]);
        $request->merge(['part_number' => Item::where('id',$request->part_number)->first()->code]);
        $request->merge(['project_id' => Project::where('uuid',$request->project_id)->first()->id]);
        $request->merge(['type_id' => Type::ofHtCrrType()->where('code','parent')->first()->id]);
        $htcrr = HtCrr::create($request->all());

        $htcrr->progresses()->save(new Progress([
            'status_id' =>  Status::where('code','removal-open')->first()->id,
            'progressed_by' => Auth::id()
        ]));

      
        if(Type::where('id',$request->skill_id)->first()->code == 'eri'){
            $htcrr->skills()->attach(Type::where('code','electrical')->first()->id);
            $htcrr->skills()->attach(Type::where('code','radio')->first()->id);
            $htcrr->skills()->attach(Type::where('code','instrument')->first()->id);
        }
        else{
            $htcrr->skills()->attach($request->skill_id);
        }

        $parent_id = $htcrr->id;

        $htcrr = HtCrr::create([
            'code' => DocumentNumber::generate('JREM-',$number),
            'parent_id' => $parent_id,
            'type_id' => Type::ofHtCrrType()->where('code','removal')->first()->id,
            'project_id' => $request->project_id,
            'position' => $request->position,
            'estimation_manhour' => $request->removal_manhour_estimation,
            'part_number' => $request->part_number,
            'serial_number' => $request->sn_off
        ]);

        $htcrr->progresses()->save(new Progress([
            'status_id' =>  Status::where('code','removal-open')->first()->id,
            'progressed_by' => Auth::id()
        ]));

        $htcrr = HtCrr::create([
            'code' => DocumentNumber::generate('JINS-', $number),
            'parent_id' => $parent_id,
            'type_id' => Type::ofHtCrrType()->where('code','installation')->first()->id,
            'project_id' => $request->project_id,
            'estimation_manhour' => $request->installation_manhour_estimation,
            'position' => $request->position,
            'serial_number' => $request->sn_on
        ]);
        
        
        return response()->json($htcrr);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HtCrr  $htCrr
     * @return \Illuminate\Http\Response
     */
    public function show(HtCrr $htCrr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HtCrr  $htCrr
     * @return \Illuminate\Http\Response
     */
    public function edit(HtCrr $htcrr)
    {
            $htcrr->removal_mhrs .= HtCrr::where('parent_id',$htcrr->id)->get()->first()->estimation_manhour;
            $htcrr->installation_mhrs .= HtCrr::where('parent_id',$htcrr->id)->get()->last()->estimation_manhour;
            $htcrr->pn .= Item::where('code',$htcrr->part_number)->first()->id;

            if(sizeof($htcrr->skills) == 3){
                $htcrr->skill_id .= Type::ofTaskCardSkill()->where('code','eri')->first()->id;
            }
            else if(sizeof($htcrr->skills) == 1){
                $htcrr->skill_id .= $htcrr->skills->first()->skill_id;
            }

            // dd($htcrr);
        return response()->json($htcrr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\HtCrrUpdate  $request
     * @param  \App\Models\HtCrr  $htCrr
     * @return \Illuminate\Http\Response
     */
    public function update(HtCrrUpdate $request, HtCrr $htcrr)
    {
        // dd($request->all());
        $request->merge(['part_number' => Item::where('id',$request->part_number)->first()->code]);
        $request->merge(['project_id' => Project::where('uuid',$request->project_id)->first()->id]);
        $request->merge(['type_id' => Type::ofHtCrrType()->where('code','parent')->first()->id]);
        $htcrr->update($request->all());

        if(Type::where('id',$request->skill_id)->first()->code == 'eri'){
            $htcrr->skills()->detach();
            $htcrr->skills()->attach(Type::where('code','electrical')->first()->id);
            $htcrr->skills()->attach(Type::where('code','radio')->first()->id);
            $htcrr->skills()->attach(Type::where('code','instrument')->first()->id);
        }
        else{
            if(sizeof($htcrr->skills) > 1 ){
                $htcrr->skills()->detach();
            }
            $htcrr->skills()->sync($request->skill_id);
        }

        $parent_id = $htcrr->id;

        $htcrr = HtCrr::where('parent_id', $parent_id)->where('type_id', Type::ofHtCrrType()->where('code','removal')->first()->id)->first();
        $htcrr->position = $request->position;
        $htcrr->part_number = $request->part_number;
        $htcrr->estimation_manhour = $request->removal_manhour_estimation;
        $htcrr->save();


        $htcrr = HtCrr::where('parent_id', $parent_id)->where('type_id', Type::ofHtCrrType()->where('code','installation')->first()->id)->first();
        $htcrr->position = $request->position;
        $htcrr->estimation_manhour = $request->installation_manhour_estimation;
        $htcrr->save();

        return response()->json($htcrr);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HtCrr  $htCrr
     * @return \Illuminate\Http\Response
     */
    public function destroy(HtCrr $htcrr)
    {
        $htcrr->delete();

        $hard_time = HtCrr::where('parent_id',$htcrr->id)->get();

        foreach($hard_time as $htcrr){
            $htcrr->delete();
        }

        return response()->json($hard_time);

    }
}
