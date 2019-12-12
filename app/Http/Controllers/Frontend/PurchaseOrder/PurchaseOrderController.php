<?php

namespace App\Http\Controllers\Frontend\PurchaseOrder;

use Auth;
use Carbon\Carbon;
use App\Models\Tax;
use App\Models\Type;
use App\Models\Item;
use App\Models\Vendor;
use App\Models\Status;
use App\Models\Approval;
use App\Models\Currency;
use App\Models\PurchaseOrder;
use App\Models\PurchaseRequest;
use App\Helpers\DocumentNumber;
use App\Http\Controllers\Controller;
use App\Models\Pivots\PurchaseOrderItem;
use App\Models\Pivots\PurchaseRequestItem;
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
        $request->merge(['number' => DocumentNumber::generate('PO-', PurchaseOrder::withTrashed()->whereYear('created_at', date("Y"))->count() + 1)]);
        $request->merge(['purchase_request_id' => PurchaseRequest::where('uuid', $request->purchase_request_id)->first()->id]);
        $request->merge(['vendor_id' => Vendor::where('uuid', $request->vendor_id)->first()->id]);
        $request->merge(['ordered_at' => Carbon::parse($request->ordered_at)]);
        $request->merge(['valid_until' => Carbon::parse($request->valid_until)]);
        $request->merge(['ship_at' => Carbon::parse($request->ship_at)]);
        $request->merge(['top_start_at' => Carbon::parse($request->top_start_at)]);
        $request->merge(['top_type' => Type::where('code', $request->top_type)->first()->id]);

        $purchaseOrder = PurchaseOrder::create($request->all());

        $items = PurchaseRequestItem::where('purchase_request_id', $request->purchase_request_id)->get();

        foreach ($items as $item) {
            $primary_unit_item = Item::find($item->item_id)->unit_id;

            $PurchaseOrder = PurchaseOrder::where('purchase_request_id', $request->purchase_request_id)->count();
            if ($PurchaseOrder == 1) {
                $count = PurchaseRequestItem::where('purchase_request_id', $request->purchase_request_id)->where('item_id', $item->item_id)->count();
                if ($count == 0) {
                    $purchaseOrder->items()->attach([$item->item_id => [
                        'quantity' => $item->quantity,
                        'quantity_unit' => $item->quantity_unit,
                        'unit_id' => $item->unit_id,
                    ],
                    ]);
                } elseif ($count > 0 and PurchaseOrderItem::where('purchase_order_id', $purchaseOrder->id)->where('item_id', $item->item_id)->count() == 0) {
                    $items_pr = PurchaseRequestItem::where('purchase_request_id', $request->purchase_request_id)->where('item_id', $item->item_id)->get();
                    $count_item_pr = PurchaseRequestItem::where('purchase_request_id', $request->purchase_request_id)->where('item_id', $item->item_id)->sum('quantity_unit');

                    $purchaseOrder->items()->attach([$item->item_id => [
                        'quantity' => $count_item_pr,
                        'quantity_unit' => $count_item_pr,
                        'unit_id' => $primary_unit_item,
                    ],
                    ]);

                }
            } else {
                $quantity_unit_PurchaseOrders = PurchaseOrder::where('purchase_request_id', $request->purchase_request_id)->wherehas('approvals')->get();
                $quantity_item_po = 0;

                foreach ($quantity_unit_PurchaseOrders as $quantity_unit_PurchaseOrder) {

                    $quantity_item_po = $quantity_item_po + $quantity_unit_PurchaseOrder->items()->find($item->item_id)->pivot->quantity_unit;
                }
                $count = PurchaseRequestItem::where('purchase_request_id', $request->purchase_request_id)->where('item_id', $item->item_id)->count();
                if ($count == 0) {
                    $purchaseOrder->items()->attach([$item->item_id => [
                        'quantity' => $item->quantity_unit - $quantity_item_po,
                        'quantity_unit' => $item->quantity_unit - $quantity_item_po,
                        'unit_id' => $primary_unit_item,
                    ],
                    ]);
                } elseif ($count > 0 and PurchaseOrderItem::where('purchase_order_id', $purchaseOrder->id)->where('item_id', $item->item_id)->count() == 0) {
                    $items_pr = PurchaseRequestItem::where('purchase_request_id', $request->purchase_request_id)->where('item_id', $item->item_id)->get();
                    $count_item_pr = PurchaseRequestItem::where('purchase_request_id', $request->purchase_request_id)->where('item_id', $item->item_id)->sum('quantity_unit');

                    $purchaseOrder->items()->attach([$item->item_id => [
                        'quantity' => $count_item_pr - $quantity_item_po,
                        'quantity_unit' => $count_item_pr - $quantity_item_po,
                        'unit_id' => $primary_unit_item,
                    ],
                    ]);
                }
            }
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
        if (Type::find($purchaseOrder->top_type)->code == "cash") {
            $top = "cash";
        } else {
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
        if (Type::find($purchaseOrder->top_type)->code == "cash") {
            $top = "cash";
        } else {
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
        $request->merge([
            'ordered_at' => Carbon::parse($request->ordered_at),
            'valid_until' => Carbon::parse($request->valid_until),
            'ship_at' => Carbon::parse($request->ship_at),
            'top_start_at' => Carbon::parse($request->top_start_at),
            'top_type' => Type::where('code', $request->top_type)->first()->id,
            'vendor' => $request->vendor,

        ]);

        $purchaseOrder->update($request->all());

        //todo ppn
        $tax = Type::ofTaxPaymentMethod()->where('code', 'exclude')->first();
        $tax_type = Type::ofTax()->where('code', 'ppn')->first();
        $subtotal_after_discount = $request->total_before_tax;
        $tax_amount = $tax_percentage = 0;
        if ($tax->code == "include") {
            $tax_percentage = $request->tax_amount;
            $tax_amount = $request->total_before_tax - ($subtotal_after_discount / 1.1 * ($request->tax_amount / 100));
        } elseif ($tax->code == "exclude") {
            $tax_percentage = $request->tax_amount;
            $tax_amount = $subtotal_after_discount * ($request->tax_amount / 100);
        }

        if (sizeof($purchaseOrder->taxes) > 0) {
            if ($tax->code == "none") {
                $purchaseOrder->taxes()->delete();
            } else {
                $tax = Tax::where('uuid', $purchaseOrder->taxes->last()->uuid)->update([
                    'taxable_type' => 'App\Models\PurchaseOrder',
                    'taxable_id' => $purchaseOrder->id,
                    'type_id' => $tax_type->id,
                    'method_type_id' => $tax->id,
                    'percent' => $tax_percentage,
                    'amount' => $tax_amount,
                ]);
            }
        } else {
            $purchaseOrder->taxes()->save(new Tax([
                'taxable_type' => 'App\Models\PurchaseOrder',
                'taxable_id' => $purchaseOrder->id,
                'type_id' => $tax_type->id,
                'method_type_id' => $tax->id,
                'percent' => $tax_percentage,
                'amount' => $tax_amount,
            ]));
        }

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
        $PurchaseOrders = PurchaseOrder::where('purchase_request_id', $purchaseOrder->purchase_request_id)->wherehas('approvals')->get();

        $PurchaseRequest = PurchaseRequest::find($purchaseOrder->purchase_request_id);

        $status_pr_close = true;

        foreach ($PurchaseRequest->items as $item) {
            $quantity_item_pr = $PurchaseRequest->items()->where('uuid', $item->uuid)->first()->pivot->quantity_unit;

            $quantity_item_po = 0;

            foreach ($PurchaseOrders as $PurchaseOrder) {
                $quantity_item_po = $quantity_item_po + $PurchaseOrder->items()->where('uuid', $item->uuid)->first()->pivot->quantity_unit;
            }

            if ($quantity_item_po > $quantity_item_pr) {
                $status_notification = array(
                    'status' => "error",
                );

                return response()->json($status_notification);
            }

            if($quantity_item_po < $quantity_item_pr){
                $status_pr_close = false;
            }

        }

        $purchaseOrder->approvals()->save(new Approval([
            'approvable_id' => $purchaseOrder->id,
            'conducted_by' => Auth::id(),
            'is_approved' => 1,
        ]));

        $ppurchaseOrder->purchase_request->progresses()->save(new Progress([
            'status_id' =>  Status::ofPurchaseRequest()->where('code','close')->first()->id,
            'progressed_by' => Auth::id()
        ]));

        $status_notification = array(
            'status' => "success",
        );

        return response()->json($status_notification);
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  \App\Models\PurchaseOrder $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    function print(PurchaseOrder $purchaseOrder) {
        $items = PurchaseOrderItem::with('item', 'item.unit', 'item.categories')->where('purchase_order_id', $purchaseOrder->id)->whereHas('item', function ($query) {
            $query->whereHas('categories', function ($query2) {
                $query2->whereIn('code', ['raw', 'cons', 'comp']);
            });
        })->get();

        $pdf = \PDF::loadView('frontend/form/purchase_order', [
            'username' => Auth::user()->name,
            'purchaseOrder' => $purchaseOrder,
            'items' => $items,
            'created_by' => $purchaseOrder->audits->first()->user->name,
        ]);

        return $pdf->stream();
    }
}
