<?php

namespace App\Http\Controllers\Frontend;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\Type;
use App\Models\PurchaseRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\PurchaseRequestStore;
use App\Http\Requests\Frontend\PurchaseRequestUpdate;

class PurchaseRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.purchase-request.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.purchase-request.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\PurchaseRequestStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseRequestStore $request)
    {
        $request->type_id = Type::where('of','purchase-request')->where('name',$request->type_id)->first()->id;
        $request->requested_at = Carbon::parse($request->requested_at);
        $request->required_at = Carbon::parse($request->required_at);

        $purchaseRequest = PurchaseRequest::create([
            'number' => $request->number,
            'type_id' => $request->type_id,
            'requested_at' => $request->requested_at,
            'required_at' => $request->required_at,
            'description' => $request->description,
            ]);
            
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
        return view('frontend.purchase-request.show', [
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
        return view('frontend.purchase-request.edit', [
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
        $purchaseRequest = PurchaseRequest::update([
            'number' => $request->number,
            'type_id' => $request->type_id,
            'requested_at' => $request->date,
            'required_at' => $request->date_required,
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
        return response()->json($purchaseRequest);
    }

    /**
     * Adding item into purchase request.
     *
     * @param  \App\Models\PurchaseRequest  $purchaseRequest
     * @return \Illuminate\Http\Response
     */
    public function add_item(PurchaseRequest $purchaseRequest,Item $item){
        $purchaseRequest->items()->attach($item->id, [
            'quantity' => 0,
            'unit_id' => $item->unit_id
        ]);

        return response()->json($purchaseRequest);
    }
    
}
