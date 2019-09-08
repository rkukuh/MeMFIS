<?php

namespace App\Http\Controllers\Frontend\PurchaseOrder;

use Auth;
use Carbon\Carbon;
use App\Models\Type;
use App\Models\Vendor;
use App\Models\Approval;
use App\Models\Currency;
use App\Models\PurchaseOrder;
use App\Models\PurchaseRequest;
use App\Helpers\DocumentNumber;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PurchaseOrderStore;
use App\Http\Requests\Frontend\PurchaseOrderUpdate;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.purchase-order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.purchase-order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\PurchaseOrderStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseOrderStore $request)
    {
        $request->merge(['number' => DocumentNumber::generate('PO-', PurchaseOrder::withTrashed()->count()+1)]);
        $request->merge(['purchase_request_id' => PurchaseRequest::where('uuid',$request->purchase_request_id)->first()->id]);
        $request->merge(['ordered_at' => Carbon::parse($request->ordered_at)]);
        $request->merge(['valid_until' => Carbon::parse($request->valid_until)]);
        $request->merge(['ship_at' => Carbon::parse($request->ship_at)]);
        $request->merge(['top_start_at' => Carbon::parse($request->top_start_at)]);
        $request->merge(['top_type' => Type::where('code',$request->top_type)->first()->id]);

        $purchaseOrder = PurchaseOrder::create($request->all());

        $items = PurchaseRequest::find($request->purchase_request_id)->items;
        // dd($items);

        foreach($items as $item){
            $purchaseOrder->items()->attach([$item->pivot->item_id => [
                'quantity'=> $item->pivot->quantity,
                'unit_id' => $item->pivot->unit_id
                ]
            ]);
        }

        return response()->json($purchaseOrder);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        if(Type::find($purchaseOrder->top_type)->code == "cash"){
            $top = "cash";
        }
        else{
            $top = "by-date";
        }

        return view('frontend.purchase-order.show', [
            'top' => $top,
            'purchaseOrder' => $purchaseOrder,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        if(Type::find($purchaseOrder->top_type)->code == "cash"){
            $top = "cash";
        }
        else{
            $top = "by-date";
        }
        return view('frontend.purchase-order.edit', [
            'top' => $top,
            'vendors' => Vendor::all(),
            'currencies' => Currency::all(),
            'purchaseOrder' => $purchaseOrder,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\PurchaseOrderUpdate  $request
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(PurchaseOrderUpdate $request, PurchaseOrder $purchaseOrder)
    {
        $request->merge(['ordered_at' => Carbon::parse($request->ordered_at)]);
        $request->merge(['valid_until' => Carbon::parse($request->valid_until)]);
        $request->merge(['ship_at' => Carbon::parse($request->ship_at)]);
        $request->merge(['top_start_at' => Carbon::parse($request->top_start_at)]);
        $request->merge(['top_type' => Type::where('code',$request->top_type)->first()->id]);

        $purchaseOrder->update($request->all());

        return response()->json($purchaseOrder);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->delete();

        return response()->json($purchaseOrder);
    }

    /**
     * Approve the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function approve(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->approvals()->save(new Approval([
            'approvable_id' => $purchaseOrder->id,
            'conducted_by' => Auth::id(),
            'is_approved' => 1
        ]));

        return response()->json($purchaseOrder);
    }
}
