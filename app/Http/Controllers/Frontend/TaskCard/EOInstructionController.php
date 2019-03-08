<?php

namespace App\Http\Controllers\Frontend\TaskCard;

use App\Models\TaskCard;
use App\Models\EOInstruction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\EOInstructionStore;
use App\Http\Requests\Frontend\EOInstructionUpdate;

class EOInstructionController extends Controller
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
     * @param  \App\Http\Requests\Frontend\EOInstructionStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskCard $taskcard, EOInstructionStore $request)
    {
        $eo_instruction = new EOInstruction($request->all());
        $taskcard->eo_instructions()->save($eo_instruction);
        return response()->json($taskcard);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EOInstruction  $eo_instruction
     * @return \Illuminate\Http\Response
     */
    public function show(TaskCard $taskCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EOInstruction  $eo_instruction
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskCard $taskcard, EOInstruction $eo_instruction)
    {
        dd($eo_instruction);
        return response()->json($eo_instruction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\EOInstructionUpdate  $request
     * @param  \App\Models\EOInstruction  $eo_instruction
     * @return \Illuminate\Http\Response
     */
    public function update(EOInstructionUpdate $request, EOInstruction $eo_instruction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EOInstruction  $eo_instruction
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskCard $taskcard, EOInstruction $eo_instruction)
    {
        $eo_instruction->delete();

        return response()->json($eo_instruction);
    }
}
