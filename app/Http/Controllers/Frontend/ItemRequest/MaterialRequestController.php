<?php

namespace App\Http\Controllers\Frontend\ItemRequest;

use Auth;
use App\Models\Employee;
use App\Models\Storage;
use App\Models\Approval;
use App\Models\Item;
use App\Models\ItemRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ItemRequestStore;
use App\Http\Requests\Frontend\ItemRequestUpdate;
use App\Helpers\DocumentNumber;
use App\Models\JobCard;
use App\Models\Type;

class MaterialRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jobcard = JobCard::where('uuid', '=', 'e83107ef-badd-4595-9878-72bace74651a')->first();
        $items = $jobcard->jobcardable->materials;
        dd($items->toArray());
        return view('frontend.material-request-jobcard.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.material-request-jobcard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemRequestStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequestStore $request)
    {
        $type = Type::where('code', '=', 'material')
            ->where('of', 'item-request')
            ->pluck('id')
            ->first();

        $request->merge(['number' => DocumentNumber::generate('MTRQ-', ItemRequest::withTrashed()->count() + 1)]);
        $request->merge(['type_id' => $type]);
        $request->merge(['requestable_type' => 'App\Models\ItemRequest']);
        $request->merge(['requestable_id' => ItemRequest::withTrashed()->count() + 1]);

        $itemRequest = ItemRequest::create($request->all());

        $jobcard = JobCard::where('uuid', $request->jc_no)->first();
        $items = $jobcard->jobcardable->materials;

        foreach ($items as $item) {
            $itemRequest->items()->attach([
                'request_id' => $itemRequest->id,
                'item_id' => $item->pivot->item_id,
                'unit_id' => $item->pivot->unit_id,
                'quantity' => $item->pivot->quantity,
                'note' => $item->pivot->note
            ]);
        }

        return response()->json($itemRequest);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InventoryOut  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function show(ItemRequest $itemRequest)
    {
        return view('frontend.material-request-jobcard.show', [
            'itemRequest' => $itemRequest
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemRequest $itemRequest)
    {
        $storages = Storage::get();
        $employees = Employee::get();

        return view('frontend.material-request-jobcard.edit', [
            'storages' => $storages,
            'employees' => $employees,
            'itemRequest' => $itemRequest,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemRequestUpdate  $request
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequestUpdate $request, ItemRequest $itemRequest)
    {
        $itemRequest->update($request->all());

        return response()->json($itemRequest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemRequest $itemRequest)
    {
        $itemRequest->delete();
    }

    /**
     * Approve the specified resource from storage.
     *
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function approve(ItemRequest $itemRequest)
    {
        $itemRequest->approvals()->save(new Approval([
            'approvable_id' => $itemRequest->id,
            'conducted_by' => Auth::id(),
            'is_approved' => 1
        ]));

        return response()->json($itemRequest);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemRequestStore  $request
     * @return \Illuminate\Http\Response
     */
    public function addItem(ItemRequestStore $request, ItemRequest $itemRequest, Item $item)
    {
        $exists = $itemRequest->items()->where('item_id', $item->id)->first();

        if ($exists) {
            return response()->json(['title' => "Danger"]);
        }

        $item = Item::find($item->id);

        if (!is_null($request->serial_no)) {
            $itemRequest->items()->attach([
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

            return response()->json($itemRequest);
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

        $itemRequest->items()->attach([
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

        return response()->json($itemRequest);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\InventoryInUpdate  $request
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function updateItem(ItemRequestUpdate $request, ItemRequest $itemRequest, Item $item)
    {
        $itemRequest->items()->updateExistingPivot(
            $item->id,
            [
                'quantity' => $request->quantity,
                'unit_id' => $request->unit_id,
                'description' => $request->remark
            ]
        );

        return response()->json($itemRequest);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ItemRequest  $itemRequest
     * @return \Illuminate\Http\Response
     */
    public function deleteItem(ItemRequest $itemRequest, Item $item)
    {
        $itemRequest->items()->detach($item->id);

        return response()->json($itemRequest);
    }
}
