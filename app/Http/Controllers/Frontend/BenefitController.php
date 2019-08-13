<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Benefit;
use App\Models\Type;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\BenefitStore;
use App\Http\Requests\Frontend\BenefitUpdate;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.benefit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.benefit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\BenefitStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BenefitStore $request)
    {
        $base_id = null;

        $prorate_id = null;

        $base = Type::select('id')->where('uuid',$request->calculation_reference)->first();

        $prorate = Type::select('id')->where('uuid',$request->pro_rate_base_calculation)->first();

        if(!empty($base->id)){
            $base_id = $base->id;
        }

        if(!empty($prorate->id)){
            $prorate_id = $prorate->id;
        }

        $benefit = Benefit::create([
            'code' => $request->benefits_code,
            'name' => $request->benefits_name,
            'description' => $request->description,
            'base_calculation' => $base_id,
            'prorate_calculation' => $prorate_id
        ]);

        // TODO: Return error message as JSON
        return response()->json($benefit);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function show(Benefit $benefit)
    {
        $base_calculation = Type::select('name')->where('id',$benefit->base_calculation)->first();
        $prorate_calculation = Type::select('name')->where('id',$benefit->prorate_calculation)->first();

        if(empty($base_calculation->name)){
            $base_calculation = null;
        }else{
            $base_calculation = $base_calculation->name;
        }

        if(empty($prorate_calculation->name)){
            $prorate_calculation = null;
        }else{
            $prorate_calculation = $prorate_calculation->name;
        }
        return view('frontend.benefit.show',['benefit' => $benefit,'base' => $base_calculation,'prorate' => $prorate_calculation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function edit(Benefit $benefit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\BenefitUpdate  $request
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function update(BenefitUpdate $request, Benefit $benefit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Benefit  $benefit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Benefit $benefit)
    {
        //
    }
}
