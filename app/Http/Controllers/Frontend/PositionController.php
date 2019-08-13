<?php

namespace App\Http\Controllers\Frontend;

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
        $benefits_position = Position::with('benefits')->where('uuid',$position->uuid)->whereNotNull('deleted_at')->get();
        return view('frontend.position.show',['position' => $position,'benefits_position' => $benefits_position]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        $benefits_position = Position::with('benefits')->where('uuid',$position->uuid)->get();
        return view('frontend.position.edit',['position' => $position,'benefits_position' => $benefits_position]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        // $position->delete();

        $data_position = Position::where('uuid', $position->uuid)->first();
        // $id = $data_position->id;
        // $delete_at = $data_position->deleted_at;
        
        // //Update Benefits_Position
        // DB::table('benefits_position')
        // ->where('position_id',$id)
        // ->update([
        //     'deleted_at' => $delete_at
        // ]);

        // TODO: Return error message as JSON
        return response()->json($data_position);
    }
}
