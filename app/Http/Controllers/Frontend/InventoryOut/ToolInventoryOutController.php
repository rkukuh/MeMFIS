<?php

namespace App\Http\Controllers\Frontend\InventoryOut;

use Auth;
use App\Models\Employee;
use App\Models\Storage;
use App\Models\Approval;
use App\Models\Item;
use App\Models\Unit;
use Carbon\Carbon;
use App\Models\InventoryOut;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\InventoryOutStore;
use App\Http\Requests\Frontend\InventoryOutUpdate;
use App\Helpers\DocumentNumber;

class ToolInventoryOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.inventory-out.tool.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.inventory-out.tool.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\InventoryOutStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InventoryOutStore $request)
    {
        $request->merge(['number' => DocumentNumber::generate('IOUT-', InventoryOut::withTrashed()->whereYear('created_at', date("Y"))->count()+1)]);
        $request->merge(['inventoryoutable_type' => 'App\Models\InventoryOut']);
        $request->merge(['inventoryoutable_id' => InventoryOut::withTrashed()->count() + 1]);

        $additionals = [];

        $additionals['ref_no'] = $request->ref_no;
        $additionals['created_by'] = Auth::id();

        $request->merge(['additional' => json_encode($additionals)]);

        $inventoryOut = InventoryOut::create($request->all());

        return response()->json($inventoryOut);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function show(InventoryOut $inventoryOut)
    {
        return view('frontend.inventory-out.tool.show', [
            'inventoryOut' => $inventoryOut,
            'additionals' => json_decode($inventoryOut->additional)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function edit(InventoryOut $inventoryOut)
    {
        $storages = Storage::get();
        $employees = Employee::get();

        return view('frontend.inventory-out.tool.edit', [
            'storages' => $storages,
            'employees' => $employees,
            'inventoryOut' => $inventoryOut,
            'additionals' => json_decode($inventoryOut->additional)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\InventoryOutUpdate  $request
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function update(InventoryOutUpdate $request, InventoryOut $inventoryOut)
    {
        $additionals = json_decode($inventoryOut->additional);
        $additionals->ref_no = $request->ref_no;
        $request->merge(['additional' => json_encode($additionals)]);
        $inventoryOut->update($request->all());

        return response()->json($inventoryOut);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function destroy(InventoryOut $inventoryOut)
    {
        $inventoryOut->delete();
    }

    /**
     * Approve the specified resource from storage.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function approve(InventoryOut $inventoryOut)
    {
        $inventoryOut->approvals()->save(new Approval([
            'approvable_id' => $inventoryOut->id,
            'conducted_by' => Auth::id(),
            'is_approved' => 1
        ]));

        return response()->json($inventoryOut);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemInventoryOutStore  $request
     * @return \Illuminate\Http\Response
     */
    public function addItem(InventoryOutStore $request, InventoryOut $inventoryOut, Item $item)
    {
        $request->merge(['exp_date' => Carbon::parse($request->exp_date)]);
        $request->merge(['unit_id' => Unit::where('uuid', $request->unit_id)->first()->id]);
        $exists = $inventoryOut->items()->where('item_id', $item->id)->first();

        if ($exists) {
            return response()->json(['title' => "Danger"]);
        }

        $item = Item::find($item->id);

        if (!is_null($request->serial_no)) {
                $inventoryOut->items()->attach([
                    $item->id => [
                        'quantity' => 1,
                        'unit_id' => $item->unit_id,
                        'quantity_in_primary_unit' => 1,
                        'expired_at' => $request->exp_date,
                        'serial_number' => $request->serial_no,
                        'purchased_price' => 0, // ??
                        'total' => 0, // ??
                        'description' => $request->remark
                    ]
                ]);

            return response()->json($inventoryOut);
        }

        $quantity_unit = $request->quantity;

        if ($request->unit_id != $item->unit_id) {
            $quantity = $request->quantity;
            // $qty_uom = $item->units->where('uom.unit_id', $item->unit_id)->first()->uom->quantity;

            if (!is_null($request->unit_id)) {
                $qty_uom = $item->units->where('uom.unit_id', $request->unit_id)->first()->uom->quantity;
            }

            $quantity_unit = $qty_uom * $quantity;
        }

        $inventoryOut->items()->attach([
            $item->id => [
                'quantity' => $request->quantity,
                'unit_id' => $request->unit_id,
                'quantity_in_primary_unit' => $quantity_unit,
                'expired_at' => $request->exp_date,
                'purchased_price' => 0, // ??
                'total' => 0, // ??
                'description' => $request->remark
            ]
        ]);

        return response()->json($inventoryOut);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\InventoryInUpdate  $request
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function updateItem(InventoryOutUpdate $request, InventoryOut $inventoryOut, Item $item)
    {
        $request->merge(['unit_id' => Unit::where('uuid', $request->unit_id)->first()->id]);

        $inventoryOut->items()->updateExistingPivot(
            $item->id,
            [
                'quantity' => $request->quantity,
                'unit_id' => $request->unit_id,
                'description' => $request->remark
            ]
        );

        return response()->json($inventoryOut);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InventoryOut  $inventoryOut
     * @return \Illuminate\Http\Response
     */
    public function deleteItem(InventoryOut $inventoryOut, Item $item)
    {
        $inventoryOut->items()->detach($item->id);

        return response()->json($inventoryOut);
    }
}
