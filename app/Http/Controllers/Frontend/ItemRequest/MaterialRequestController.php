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
                $item->id => [
                    'request_id' => $itemRequest->id,
                    'item_id' => $item->pivot->item_id,
                    'unit_id' => $item->pivot->unit_id,
                    'quantity' => $item->pivot->quantity,
                    'note' => $item->pivot->note
                ]
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
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemRequestUpdate  $request
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
                'note' => $request->remark
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
