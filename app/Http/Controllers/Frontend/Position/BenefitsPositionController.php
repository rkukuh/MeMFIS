<?php

namespace App\Http\Controllers\Frontend\Position;

use App\Models\Benefit;
use App\Models\Position;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\BenefitsPositionStore;
use App\Http\Requests\Frontend\BenefitsPositionUpdate;

class BenefitsPositionController extends Controller
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
    public function create(Request $request)
    {
        $benefit= Benefit::get();
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\BenefitsPositionStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BenefitsPositionStore $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position_now = Position::with('benefit_current')->where('positions.uuid',$id)->get();
        $benefit = Benefit::get();
        $search = array();
        $min = array();
        $max = array();

        for($i=0;$i < count($position_now[0]->benefit_current); $i++){
            array_push($search,$position_now[0]->benefit_current[$i]->name);
            array_push($min,$position_now[0]->benefit_current[$i]->pivot->min);
            array_push($max,$position_now[0]->benefit_current[$i]->pivot->max);
        }

        // dd($position_now[0]);
        return view('frontend.position.update-benefit',['benefit' => $benefit,'search' => $search,'min' => $min,'max' => $max,'uuid' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\BenefitsPositionUpdate  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BenefitsPositionUpdate $request, $id)
    {
        $id_position = Position::where('uuid',$id)->first()->id;
        $time = Carbon::now();

        //Update old benefits
        $updateTime = DB::table('benefit_position')
        ->where('position_id',$id_position)
        ->whereNull('updated_at')
        ->update([
            'updated_at' => $time
        ]);
        
        if(isset($request->code)){
        for($i=0;$i < count($request->code);$i++){
            $id_benefit = Benefit::where('uuid',$request->code[$i])->first()->id;
            
            $benefitPosition = DB::table('benefit_position')
            ->insert([
                'benefit_id' => $id_benefit,
                'position_id' => $id_position,
                'min' => $request->position_min[$i],
                'max' => $request->position_max[$i],
                'created_at' => $time
            ]);
        }
    }else{
        $benefitPosition = true;
    }   

        return response()->json('Data : '.$benefitPosition.' Time : '.$updateTime);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
