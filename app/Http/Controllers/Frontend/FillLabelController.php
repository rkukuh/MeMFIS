<?php

namespace App\Http\Controllers\Frontend;

use App\Models\RIR;
use App\Models\Zone;
use App\Models\Item;
use App\Models\Type;
use App\Models\Unit;
use Spatie\Tags\Tag;
use App\Models\Vendor;
use App\Models\Access;
use App\Models\Project;
use App\Models\License;
use App\Models\Storage;
use App\Models\Customer;
use App\Models\Aircraft;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Employee;
use App\Models\TaskCard;
use App\Models\ItemRequest;
use Illuminate\Http\Request;
use App\Models\Manufacturer;
use App\Models\PurchaseOrder;
use App\Models\GoodsReceived;
use App\Models\PurchaseRequest;
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
    public function toolRequestHM(ItemRequest $ItemRequest)
    {
        $data['project_no'] = $ItemRequest->requestable->quotation->quotationable->code;
        $data['ac_type'] = $ItemRequest->requestable->quotation->quotationable->aircraft->name;
        $data['ac_reg'] = $ItemRequest->requestable->quotation->quotationable->aircraft_register;

        return json_encode($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function toolRequestDefectCard(ItemRequest $ItemRequest)
    {
        $data['project_no'] = $ItemRequest->requestable->project_additional->code;
        $data['ac_type'] = $ItemRequest->requestable->project_additional->aircraft->name;
        $data['ac_reg'] = $ItemRequest->requestable->project_additional->aircraft_register;

        return json_encode($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function toolRequestWorkshop(ItemRequest $ItemRequest)
    {
        $data['workshop_no'] = "WORKSHOP NUMBER";
        $data['number'] = "PN-0000";
        $data['description'] = "escriptionD";

        return json_encode($data);
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
            if($item->unit_id == $quantity_item_recived + $GoodsReceived->items()->where('uuid',$item->uuid)->first()->pivot->unit_id){
                $quantity_item_recived = $quantity_item_recived + $GoodsReceived->items()->where('uuid',$item->uuid)->first()->pivot->quantity_unit;
            }else{
                $qty_uom = $item->units->where('uom.unit_id',$request->unit_id)->first()->uom->quantity;
                $quantity_unit = $qty_uom*$rir->items()->where('uuid',$item->uuid)->first()->pivot->quantity_unit;

                $quantity_item_recived = $quantity_item_recived + $quantity_unit;
            }
        }

        return $quantity_item_recived." ".$item->unit->name;

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
            if($item->unit_id == $quantity_item_recived + $rir->items()->where('uuid',$item->uuid)->first()->pivot->unit_id){
                $quantity_item_recived = $quantity_item_recived + $rir->items()->where('uuid',$item->uuid)->first()->pivot->quantity_unit;
            }else{
                $qty_uom = $item->units->where('uom.unit_id',$request->unit_id)->first()->uom->quantity;
                $quantity_unit = $qty_uom*$rir->items()->where('uuid',$item->uuid)->first()->pivot->quantity_unit;

                $quantity_item_recived = $quantity_item_recived + $quantity_unit;
            }
        }

        return $quantity_item_recived." ".$item->unit->name;

    }

}
