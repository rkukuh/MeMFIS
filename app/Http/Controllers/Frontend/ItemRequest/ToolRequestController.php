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
use App\Models\Quotation;
use App\Models\Project;
use App\Models\DefectCard;

class ToolRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.tool-request-jobcard.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.tool-request-jobcard.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\ItemRequestStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequestStore $request)
    {
        $type = Type::where('code', '=', 'tool')
            ->where('of', 'item-request')
            ->pluck('id')
            ->first();

        $ref = 'App\Models\JobCard';
        $jobcard = JobCard::where('uuid', $request->jc_no)->first();
        $refId = null;

        if ($jobcard) {
            $refId = $jobcard->id;
        }

        if (empty($request->jc_no)) {
            $ref = 'App\Models\Project';
            $refId = Project::where('uuid', $request->project_no)->first()->id;
        }

        $request->merge(['number' => DocumentNumber::generate('MTRQ-', ItemRequest::withTrashed()->count() + 1)]);
        $request->merge(['type_id' => $type]);
        $request->merge(['requestable_type' => $ref]);
        $request->merge(['requestable_id' => $refId]);

        $itemRequest = ItemRequest::create($request->all());
        $defectcards = [];

        if (!$jobcard) {
            $project = Project::where('uuid', $request->project_no)->first();
            $defectcards = DefectCard::where('project_additional_id', $project->id)->get();
        }

        $items = [];

        if ($jobcard) {
            $items = $jobcard->jobcardable->tools;
        }

        if ($defectcards) {
            foreach ($defectcards as $defectcard) {
                foreach ($defectcard->tools as $item) {
                    array_push($items, $item);
                }
            }
        }

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
        return view('frontend.tool-request-jobcard.show', [
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
        $project = $itemRequest->requestable;
        $quo = Quotation::where('id', $project->quotation_id)->first();
        $jobcard = null;

        if ($quo) {
            $jobcard = $project;
            $project = $quo->quotationable;
        }

        $storages = Storage::get();
        $employees = Employee::get();

        return view('frontend.material-request-jobcard.edit', [
            'storages' => $storages,
            'employees' => $employees,
            'itemRequest' => $itemRequest,
            'project' => $project,
            'jobcard' => $jobcard,
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
