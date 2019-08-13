<?php

namespace App\Http\Controllers\Frontend\Position;

use App\Models\Position;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PositionStore;
use App\Http\Requests\Frontend\PositionUpdate;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.position.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.position.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\PositionStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PositionStore $request)
    {
        $position = Position::create($request->all());

        // TODO: Return error message as JSON
        return response()->json($position);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        $benefits_position = Position::with('benefit_current')->where('uuid',$position->uuid)->get();
        $data_benefit_history_create = Position::with('benefit_history')->where('positions.uuid',$position->uuid)->get();
        
        $date_history_create = array();
        
        for($i=0;$i < count($data_benefit_history_create[0]->benefit_history);$i++){
            array_push($date_history_create,$data_benefit_history_create[0]->benefit_history[$i]->pivot->created_at);
        }
 
        $unique_raw_date_history_create = array_values(array_unique($date_history_create));

        $unique_date_history_create = array();

        rsort($unique_raw_date_history_create);
        foreach ($unique_raw_date_history_create as $val) {
            array_push($unique_date_history_create,$val);
        }

        $raw_history = [];
        $history = [];
        
        for($i=0;$i < count($unique_date_history_create);$i++){
            $raw_history[] = DB::table('benefit_position')
            ->select('benefit_position.created_at','benefit_position.updated_at','benefit_position.min','benefit_position.max','positions.name as position_name','benefits.name as benefit_name')
            ->join('positions','benefit_position.position_id','=','positions.id')
            ->join('benefits','benefit_position.benefit_id','=','benefits.id')
            ->where('benefit_position.created_at',$unique_date_history_create[$i])
            ->get();
        }

        for($i=0;$i < count($raw_history);$i++){
            for($j=0;$j < count($raw_history[$i]);$j++){
                $data[$j] = [
                     'position_name' => $raw_history[$i][$j]->position_name, 
                     'benefit_name' =>  $raw_history[$i][$j]->benefit_name,
                     'min' => $raw_history[$i][$j]->min,
                     'max' => $raw_history[$i][$j]->max,
                ];
            }
            $history[$i] = [
                'created_at' => $raw_history[$i][0]->created_at,
                'updated_at' => $raw_history[$i][0]->updated_at,
                'data' =>  $data
            ];
        }

        return view('frontend.position.edit',['position' => $position,'benefits_position' => $benefits_position,'history' => $history]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        $benefits_position = Position::with('benefit_current')->where('positions.uuid',$position->uuid)->get();
        $data_benefit_history_create = Position::with('benefit_history')->where('positions.uuid',$position->uuid)->get();
        
        $date_history_create = array();
        
        for($i=0;$i < count($data_benefit_history_create[0]->benefit_history);$i++){
            array_push($date_history_create,$data_benefit_history_create[0]->benefit_history[$i]->pivot->created_at);
        }
 
        $unique_raw_date_history_create = array_values(array_unique($date_history_create));

        $unique_date_history_create = array();

        rsort($unique_raw_date_history_create);
        foreach ($unique_raw_date_history_create as $val) {
            array_push($unique_date_history_create,$val);
        }

        $raw_history = [];
        $history = [];

        for($i=0;$i < count($unique_date_history_create);$i++){
            $raw_history[] = DB::table('benefit_position')
            ->select('benefit_position.created_at','benefit_position.updated_at','benefit_position.min','benefit_position.max','positions.name as position_name','benefits.name as benefit_name')
            ->join('positions','benefit_position.position_id','=','positions.id')
            ->join('benefits','benefit_position.benefit_id','=','benefits.id')
            ->where('benefit_position.created_at',$unique_date_history_create[$i])
            ->get();
        }

        for($i=0;$i < count($raw_history);$i++){
            for($j=0;$j < count($raw_history[$i]);$j++){
                $data[$j] = [
                     'position_name' => $raw_history[$i][$j]->position_name, 
                     'benefit_name' =>  $raw_history[$i][$j]->benefit_name,
                     'min' => $raw_history[$i][$j]->min,
                     'max' => $raw_history[$i][$j]->max,
                ];
            }
            $history[$i] = [
                'created_at' => $raw_history[$i][0]->created_at,
                'updated_at' => $raw_history[$i][0]->updated_at,
                'data' =>  $data
            ];
        }

        return view('frontend.position.edit',['position' => $position,'benefits_position' => $benefits_position,'history' => $history]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\PositionUpdate  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(PositionUpdate $request, Position $position)
    {
        $position->update($request->all());

        // TODO: Return error message as JSON
        return response()->json($position);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        $id = Position::where('uuid', $position->uuid)->first()->id;

        $position->delete();

        $data_deleted_at = DB::table('positions')->select('deleted_at')->where('uuid', $position->uuid)->first();
        
        $deleted_at = $data_deleted_at->deleted_at;
        
        // Update Benefits_Position
        DB::table('benefit_position')
        ->where('position_id',$id)
        ->update([
            'deleted_at' => $deleted_at
        ]);

        // TODO: Return error message as JSON
        return response()->json($position);
    }
}
