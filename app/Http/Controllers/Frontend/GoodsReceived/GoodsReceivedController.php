<?php

namespace App\Http\Controllers\Frontend\GoodsReceived;

use Auth;
use Carbon\Carbon;
use App\Models\Vendor;
use App\Models\Storage;
use App\Models\Employee;
use App\Models\Approval;
use App\Models\PurchaseOrder;
use App\Models\GoodsReceived;
use App\Helpers\DocumentNumber;
use Directoryxx\Finac\Model\Coa;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\GoodsReceivedStore;
use App\Http\Requests\Frontend\GoodsReceivedUpdate;

class GoodsReceivedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.goods-received-note.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.goods-received-note.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\GoodsReceivedStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsReceivedStore $request)
    {
        $request->merge(['number' => DocumentNumber::generate('GRN-', GoodsReceived::withTrashed()->count()+1)]);
        $request->merge(['purchase_order_id' => PurchaseOrder::where('uuid',$request->purchase_order_id)->first()->id]);
        $request->merge(['storage_id' => Storage::where('uuid',$request->storage_id)->first()->id]);
        $request->merge(['received_at' => Carbon::parse($request->received_at)]);
        $request->merge(['received_by' => Employee::where('uuid',$request->received_by)->first()->user->id]);

        $additionals = null;

        $additionals['SupplierRefNo'] = $request->do_no;
        $additionals['SupplierRefDate'] = $request->do_date;

        $request->merge(['additionals' => json_encode($additionals)]);

        $goodsReceived = GoodsReceived::create($request->all());

        $goodsReceived->coa()->save(Coa::find(Vendor::find(PurchaseOrder::find($request->purchase_order_id)->vendor_id)->coa->first()->id));


    //     @if(isset(json_decode($jobCard->taskcard->additionals)->internal_number))
    //     {{json_decode($jobCard->taskcard->additionals)->internal_number}}
    // @else
    //     -
    // @endif

        // $items = PurchaseOrder::find($request->purchase_order_id)->items;

        // foreach($items as $item){
        //     $goodsReceived->items()->attach([$item->pivot->item_id => [
        //         'quantity'=> $item->pivot->quantity,
        //         'quantity_unit'=> $item->pivot->quantity,
        //         'unit_id' => $item->pivot->unit_id
        //         ]
        //     ]);
        // }

        return response()->json($goodsReceived);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return \Illuminate\Http\Response
     */
    public function show(GoodsReceived $goodsReceived)
    {
        return view('frontend.goods-received-note.show', [
            'goodsReceived' => $goodsReceived,
            'additionals' => json_decode($goodsReceived->additionals)
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return \Illuminate\Http\Response
     */
    public function edit(GoodsReceived $goodsReceived)
    {
        return view('frontend.goods-received-note.edit', [
            'goodsReceived' => $goodsReceived,
            'additionals' => json_decode($goodsReceived->additionals),
            'employees' => Employee::all(),
            'employee_uuid' => Employee::find($goodsReceived->received_by)->uuid
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\GoodsReceivedUpdate  $request
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return \Illuminate\Http\Response
     */
    public function update(GoodsReceivedUpdate $request, GoodsReceived $goodsReceived)
    {
        $request->merge(['storage_id' => Storage::where('uuid',$request->storage_id)->first()->id]);
        $request->merge(['received_at' => Carbon::parse($request->received_at)]);
        $request->merge(['received_by' => Employee::where('uuid',$request->received_by)->first()->user->id]);

        $goodsReceived->update($request->all());

        return response()->json($goodsReceived);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return \Illuminate\Http\Response
     */
    public function destroy(GoodsReceived $goodsReceived)
    {
        $goodsReceived->delete();

        return response()->json($goodsReceived);
    }

    /**
     * Approve the specified resource from storage.
     *
     * @param  \App\Models\GoodsReceived  $goodsReceived
     * @return \Illuminate\Http\Response
     */
    public function approve(GoodsReceived $goodsReceived)
    {
        $goodsReceived->approvals()->save(new Approval([
            'approvable_id' => $goodsReceived->id,
            'conducted_by' => Auth::id(),
            'is_approved' => 1
        ]));

        return response()->json($goodsReceived);
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  \App\Models\GoodsReceived $goodsReceived
     * @return \Illuminate\Http\Response
     */
    public function print(GoodsReceived $goodsReceived)
    {
        $pdf = \PDF::loadView('frontend/form/goods_received_note',[
                'username' => Auth::user()->name,
                'goodsReceived' => $goodsReceived,
                'additionals' => json_decode($goodsReceived->additionals),
                'created_by' => $goodsReceived->audits->first()->user->name
                ]);

        return $pdf->stream();
    }

}
