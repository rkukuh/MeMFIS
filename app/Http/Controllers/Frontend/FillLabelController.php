<?php

namespace App\Http\Controllers\Frontend;

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

}
