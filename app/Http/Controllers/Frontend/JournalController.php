<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Journal;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\JournalStore;
use App\Http\Requests\Frontend\JournalUpdate;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.journal.index');
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
     * @param  \App\Http\Requests\Frontend\JournalStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JournalStore $request)
    {
        $journal = Journal::create([
            'code' => $request->code,
            'name' => $request->name,
            'type_id' => $request->type,
            'level' => $request->level,
            'description' => $request->description,
        ]);

        return response()->json($journal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function show(Journal $journal)
    {
        return response()->json($journal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function edit(Journal $journal)
    {
        return response()->json($journal);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\JournalUpdate  $request
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function update(JournalUpdate $request, Journal $journal)
    {
        // $journal = Journal::find($journal);
        $journal->code = $request->code;
        $journal->name = $request->name;
        $journal->type_id = $request->type;
        $journal->level = $request->level;
        $journal->description = $request->description;
        $journal->save();

        return response()->json($journal);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Journal  $journal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journal $journal)
    {
        $journal->delete();

        return response()->json($journal);
    }

}
