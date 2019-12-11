<?php

namespace App\Http\Controllers\Frontend\PurchaseRequest;

use Auth;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\Type;
use App\Models\Approval;
use App\Helpers\DocumentNumber;
use App\Models\PurchaseRequest;
use App\Http\Controllers\Controller;
use App\Models\Pivots\PurchaseRequestItem;
use App\Http\Requests\Frontend\PurchaseRequestUpdate;
use App\Http\Requests\Frontend\PurchaseRequestStore;

class ServicePurchaseRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.purchase-request.service.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.purchase-request.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\PurchaseRequestStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseRequestStore $request)
    {
        $request->merge(['number' => DocumentNumber::generate('PRGN-', PurchaseRequest::withTrashed()->whereYear('created_at', date("Y"))->count()+1)]);
        $request->merge(['type_id' => Type::where('of','purchase-request')->where('uuid',$request->type_id)->first()->id ]);
        $request->merge(['requested_at' => Carbon::parse($request->requested_at)]);
        $request->merge(['required_at' => Carbon::parse($request->required_at)]);

        $purchaseRequest = PurchaseRequest::create($request->all());

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
        return view('frontend.purchase-request.service.show', [
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
        return view('frontend.purchase-request.service.edit', [
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
        $purchaseRequest->update($request->all());

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

    /**
     * Search the specified resource from storage.
     *
     * @param  \App\Models\PurchaseRequest $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function print(PurchaseRequest $purchaseRequest)
    {
        $pdf = \PDF::loadView('frontend/form/purchase_request_service',[
                'username' => Auth::user()->name,
                'purchaseRequest' => $purchaseRequest,
                'items' => PurchaseRequestItem::where('purchase_request_id',$purchaseRequest->id)->get(),
                'created_by' => $purchaseRequest->audits->first()->user->name
                ]);

        return $pdf->stream();
    }

}
