<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Manhour;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ManhourStore;
use App\Http\Requests\Frontend\ManhourUpdate;

class ManhourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('frontend.item.material.index');
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
     * @param  \App\Http\Requests\Frontend\ManhourStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManhourStore $request, Item $item)
    {
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manhour  $manhour
     * @return \Illuminate\Http\Response
     */
    public function show(Manhour $manhour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manhour  $manhour
     * @return \Illuminate\Http\Response
     */
    public function edit(Manhour $manhour)
    {
        $tags = [];
        foreach($request->selectedtags as $selectedtags ){ array_push($tags,Tag::findOrCreate($selectedtags, 'item'));}
        if ($item->update($request->all())) {
            $item->categories()->sync($request->category);
            $item->syncTags($tags);

            return response()->json($item);
        }

        // TODO: Return error message as JSON
        return false;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ManhourUpdate  $request
     * @param  \App\Models\Manhour  $manhour
     * @return \Illuminate\Http\Response
     */
    public function update(ManhourUpdate $request, Manhour $manhour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manhour  $manhour
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manhour $manhour)
    {
        //
    }
}
