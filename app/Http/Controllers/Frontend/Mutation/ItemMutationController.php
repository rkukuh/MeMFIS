<?php

namespace App\Http\Controllers\Frontend\Mutation;

use App\Models\Mutation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\MutationStore;
use App\Http\Requests\Frontend\MutationUpdate;
use App\Models\Item;

class ItemMutationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Mutation::with('items')->get();

        return response()->json($items);
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
     * @param  \App\Http\Requests\Frontend\MutationStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MutationStore $request, Mutation $mutation, Item $item)
    {
        $exists = $mutation->items()->where('item_id', $item->id)->first();

        if ($exists) {
            return response()->json(['title' => "Danger"]);
        }

        $item = Item::find($item->id);

        if (!is_null($request->serial_no)) {
            foreach ($request->serial_no as $serial_number) {

                $mutation->items()->attach([
                    $item->id => [
                        'quantity' => 1,
                        'unit_id' => $item->unit_id,
                        'quantity_in_primary_unit' => 1,
                        // 'expired_at' => $request->exp_date,
                        'serial_number' => $serial_number,
                        'purchased_price' => 0, // ??
                        'total' => 0, // ??
                        'note' => $request->remark
                    ]
                ]);
            }

            return response()->json($mutation);
        }

        $quantity_unit = $request->quantity;

        if ($request->unit_id <> $item->unit_id) {
            $quantity = $request->quantity;
            $qty_uom = $item->units->where('uom.unit_id', $item->unit_id)->first()->uom->quantity;

            if (!is_null($request->unit_id)) {
                $qty_uom = $item->units->where('uom.unit_id', $request->unit_id)->first()->uom->quantity;
            }

            $quantity_unit = $qty_uom * $quantity;
        }

        $mutation->items()->attach([
            $item->id => [
                'quantity' => $request->quantity,
                'unit_id' => $request->unit_id,
                'quantity_in_primary_unit' => $quantity_unit,
                // 'expired_at' => $request->exp_date,
                'purchased_price' => 0, // ??
                'total' => 0, // ??
                'note' => $request->remark
            ]
        ]);

        return response()->json($mutation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function show(Mutation $mutation)
    {

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function edit(Mutation $mutation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\MutationUpdate  $request
     * @param  \App\Models\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function update(MutationUpdate $request, Mutation $mutation, Item $item)
    {
        $mutation->items()->updateExistingPivot($item->id,
            [
                'quantity' => $request->quantity,
                'unit_id' => $request->unit_id,
                'note' => $request->note
            ]);

        return response()->json($mutation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mutation  $mutation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mutation $mutation, Item $item)
    {
        $mutation->items()->detach($item->id);

        return response()->json($mutation);
    }
}
