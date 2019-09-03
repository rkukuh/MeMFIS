<?php

namespace App\Http\Controllers\Frontend\PurchaseRequest;

use Auth;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\Type;
use App\Models\Project;
use App\Models\Approval;
use App\Helpers\DocumentNumber;
use App\Models\PurchaseRequest;
use App\Http\Controllers\Controller;
use App\Models\QuotationWorkPackageTaskCardItem;
use App\Http\Requests\Frontend\PurchaseRequestStore;
use App\Http\Requests\Frontend\PurchaseRequestUpdate;

class ProjectPurchaseRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.purchase-request.project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.purchase-request.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\PurchaseRequestStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseRequestStore $request)
    {
        $request->merge(['number' => DocumentNumber::generate('PR-', PurchaseRequest::withTrashed()->count()+1)]);
        $request->merge(['project_id' =>Project::where('uuid',$request->project_id)->first()->id ]);
        $request->merge(['type_id' => Type::where('of','purchase-request')->where('name','Project')->first()->id ]);
        $request->merge(['requested_at' => Carbon::parse($request->requested_at)]);
        $request->merge(['required_at' => Carbon::parse($request->required_at)]);
        $purchaseRequest = PurchaseRequest::create($request->all());

        $items = QuotationWorkPackageTaskCardItem::with('item','item.unit')->where('quotation_id',Project::find($request->project_id)->quotations->first()->id)->get();

        foreach($items as $item){
            $purchaseRequest->items()->attach([$item->item_id => [
                'quantity'=> $item->quantity,
                'unit_id' => $item->unit_id]]);
        }

        return response()->json($purchaseRequest);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseRequest $purchaseRequest)
    {
        return view('frontend.purchase-request.project.show', [
            'purchaseRequest' => $purchaseRequest,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseRequest $purchaseRequest)
    {
        return view('frontend.purchase-request.project.edit', [
            'purchaseRequest' => $purchaseRequest,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\PurchaseRequestUpdate  $request
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function update(PurchaseRequestUpdate $request, PurchaseRequest $purchaseRequest)
    {
        $request->type_id = Type::where('of','purchase-request')->where('name',$request->type_id)->first()->id;
        $request->requested_at = Carbon::parse($request->requested_at);
        $request->required_at = Carbon::parse($request->required_at);

        $purchaseRequest = PurchaseRequest::update([
            'number' => $request->number,
            'type_id' => $request->type_id,
            'requested_at' => $request->requested_at,
            'required_at' => $request->required_at,
            'description' => $request->description,
            ]);

        return response()->json($purchaseRequest);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseRequest $purchaseRequest)
    {
        $purchaseRequest->delete();

        return response()->json($purchaseRequest);
    }

    /**
     * Approve the specified resource from storage.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function approve(PurchaseRequest $purchaseRequest)
    {
        $purchaseRequest->approvals()->save(new Approval([
            'approvable_id' => $purchaseRequest->id,
            'conducted_by' => Auth::id(),
            'is_approved' => 1
        ]));

        return response()->json($purchaseRequest);
    }

}
