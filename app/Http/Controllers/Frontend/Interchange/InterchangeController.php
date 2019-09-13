<?php

namespace App\Http\Controllers\Frontend\Interchange;

use App\Models\Item;
use App\Models\Pivots\Interchange;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\InterchangeStore;
use App\Http\Requests\Frontend\InterchangeUpdate;

class InterchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.interchange.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.interchange.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\InterchangeStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InterchangeStore $request)
    {
        $item_id = $request->merge(['item_id' => Item::where('uuid',$request->item_id)->first()->id]);
        $alternate_item_id = $request->merge(['alternate_item_id' => Item::where('uuid',$request->alternate_item_id)->first()->id]);
        // dd($request->all());
        if ($request->way == 1) {
            $interchange =  Interchange::create($request->all());

            $interchange =  Interchange::create([
                'item_id' => $request->alternate_item_id,
                'alternate_item_id' => $request->item_id
            ]);

            return response()->json($interchange);

        }else{
            $interchange =  Interchange::create($request->all());

            return response()->json($interchange);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interchange  $interchange
     * @return \Illuminate\Http\Response
     */
    public function show(Interchange $interchange)
    {
        return view('frontend.interchange.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interchange  $interchange
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item,Item $alternateItem)
    {
        $Interchange = Interchange::where('item_id',$item->id)->where('alternate_item_id',$alternateItem->id)->first();

        return view('frontend.interchange.edit', [
            'Interchange' => $Interchange,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\InterchangeUpdate  $request
     * @param  \App\Models\Interchange  $interchange
     * @return \Illuminate\Http\Response
     */
    public function update(InterchangeUpdate $request, Interchange $interchange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interchange  $interchange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item,Item $alternateItem)
    {
        $Interchange = Interchange::where('item_id',$item->id)->where('alternate_item_id',$alternateItem->id)->first()->delete();

        return response()->json($Interchange);
    }
}
