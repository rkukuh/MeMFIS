<?php

namespace App\Http\Controllers\Frontend\Project;

use App\Models\Type;
use App\Models\HtCrr;
use App\Models\Project;
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
        $request->merge(['project_id' => Project::where('uuid',$request->project_id)->first()->id]);
        $request->merge(['type_id' => Type::ofHtCrrType()->where('code','parent')->first()->id]);
        $htcrr = HtCrr::create($request->all());

        if(Type::where('id',$request->skill_id)->first()->code == 'eri'){
            $htcrr->skills()->attach(Type::where('code','electrical')->first()->id);
            $htcrr->skills()->attach(Type::where('code','radio')->first()->id);
            $htcrr->skills()->attach(Type::where('code','instrument')->first()->id);
        }
        else{
            $htcrr->skills()->attach($request->skill_id);
        }

        $htcrr = HtCrr::create([
            'parent_id' => $htcrr->id,
            'type_id' => Type::ofHtCrrType()->where('code','removal')->first()->id,
            'project_id' => $request->project_id,
            'position' => $request->position,
            'part_number' => $request->part_number,
        ]);

        $htcrr = HtCrr::create([
            'parent_id' => $htcrr->id,
            'type_id' => Type::ofHtCrrType()->where('code','installation')->first()->id,
            'project_id' => $request->project_id,
            'position' => $request->position,
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
    public function edit(HtCrr $htCrr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\HtCrrUpdate  $request
     * @param  \App\Models\HtCrr  $htCrr
     * @return \Illuminate\Http\Response
     */
    public function update(HtCrrUpdate $request, HtCrr $htCrr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HtCrr  $htCrr
     * @return \Illuminate\Http\Response
     */
    public function destroy(HtCrr $htCrr)
    {
        //
    }
}
