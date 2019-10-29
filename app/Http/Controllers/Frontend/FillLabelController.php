<?php

namespace App\Http\Controllers\Frontend;

use App\Models\RIR;
use App\Models\Zone;
use App\Models\Item;
use App\Models\Type;
use App\Models\Unit;
use Spatie\Tags\Tag;
use App\Models\Access;
use App\Models\Project;
use App\Models\License;
use App\Models\Storage;
use App\Models\Customer;
use App\Models\Vendor;
use App\Models\Aircraft;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Employee;
use App\Models\TaskCard;
use App\Models\GoodsReceived;
use App\Models\Manufacturer;
use App\Models\PurchaseOrder;
use App\Models\PurchaseRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pivots\EmployeeLicense;

class FillLabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vendor($vendor)
    {
        $vendor = PurchaseOrder::with('vendor')->where('uuid',$vendor)->first();

        return json_encode($vendor);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function project($project)
    {
        $project = Project::with('quotations')->where('id',$project)->first();

        return response()->json($project);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function purchaseRequest($purchaseRequest)
    {
        $purchaseRequest = PurchaseOrder::with('purchase_request')->where('uuid',$purchaseRequest)->first();

        return json_encode($purchaseRequest);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer(Customer $customer)
    {
        $customer->load('phones','faxes','emails','addresses')->get();

        return json_encode($customer);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function purchaseOrdered(PurchaseOrder $PurchaseOrder,Item $item)
    {
        $PurchaseOrders = PurchaseOrder::where('purchase_request_id',$PurchaseOrder->purchase_request_id)->wherehas('approvals')->get();
        $quantity_item_po = 0;

        foreach($PurchaseOrders as $PurchaseOrder){
            $quantity_item_po = $quantity_item_po + $PurchaseOrder->items()->where('uuid',$item->uuid)->first()->pivot->quantity_unit;
        }

        return $quantity_item_po;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GoodsReceived(GoodsReceived $GoodsReceived,Item $item)
    {
        $GoodsReceiveds = GoodsReceived::where('purchase_order_id',$GoodsReceived->purchase_order_id)->wherehas('approvals')->get();
        $quantity_item_recived = 0;

        foreach($GoodsReceiveds as $GoodsReceived){
            $quantity_item_recived = $quantity_item_recived + $GoodsReceived->items()->where('uuid',$item->uuid)->first()->pivot->quantity_unit;
        }

        return $quantity_item_recived;

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rir(RIR $rir,Item $item)
    {
        $rirs = RIR::where('purchase_order_id',$rir->purchase_order_id)->wherehas('approvals')->get();
        $quantity_item_recived = 0;

        foreach($rirs as $rir){
            $quantity_item_recived = $quantity_item_recived + $rir->items()->where('uuid',$item->uuid)->first()->pivot->quantity_unit;
        }

        return $quantity_item_recived;

    }

}
