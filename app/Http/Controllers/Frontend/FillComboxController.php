<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Zone;
use App\Models\Item;
use App\Models\Type;
use App\Models\Unit;
use Spatie\Tags\Tag;
use App\Models\Level;
use App\Models\Vendor;
use App\Models\Access;
use App\Models\Project;
use App\Models\License;
use App\Models\Storage;
use App\Models\Station;
use App\Models\Facility;
use App\Models\Customer;
use App\Models\Aircraft;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Employee;
use App\Models\TaskCard;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Models\PurchaseOrder;
use App\Models\PurchaseRequest;
use App\Http\Controllers\Controller;
use App\Models\Pivots\EmployeeLicense;

class FillComboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categories()
    {
        $categories = Category::ofItem()
                              ->pluck('name', 'id');

        return json_encode($categories);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoriesMaterial()
    {
        $categories = Category::ofItem()
                              ->where('code','<>','tool')
                              ->pluck('name', 'id');

        return json_encode($categories);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categorieTakcard()
    {
        $categories = Category::ofTaskCardEO()
                              ->pluck('name', 'id');

        return json_encode($categories);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tags()
    {
        $tags = Tag::get()->pluck('name', 'id');

        return json_encode($tags);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function units()
    {
        $units = Unit::selectRaw('id, CONCAT(name, " (", symbol ,")") as name')
                     ->pluck('name', 'id');

        return json_encode($units);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function currencies()
    {
        $currencies = Currency::selectRaw('id, CONCAT(name, " (", symbol ,")") as full_name')
        ->pluck('full_name', 'id');

        return json_encode($currencies);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storages()
    {
        $storages = Storage::pluck('name', 'id');

        return json_encode($storages);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function licenses($id)
    {
        $general_license = License::where('code', 'general-license')->first();
        $licenses = EmployeeLicense::where('employee_id',$id)
                    ->where('license_id',$general_license->id)
                    ->pluck('code', 'id');

        return json_encode($licenses);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function employees()
    {
        $employees = Employee::selectRaw('id, CONCAT(first_name, " ", middle_name ," ", last_name) as name')
                    ->pluck('name', 'id');

        return json_encode($employees);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aviationDegrees()
    {
        $aviation_degrees = Type::ofAviationDegree()
                    ->pluck('name', 'id');

        return json_encode($aviation_degrees);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generalLicenses($id)
    {
        $general_license = EmployeeLicense::find($id);
        // dd($id,$license);
        // $aviation_degrees = Type::ofAviationDegree()
        //             ->pluck('name', 'id');
        return response()->json($general_license);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function taskcard()
    {
        $taskcards = TaskCard::selectRaw('uuid, CONCAT(number, " | ", title) as title')->pluck('title', 'uuid');

        return json_encode($taskcards);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function otrCertification()
    {
        $otr_certifications = Type::ofTaskCardSkill()
                              ->pluck('name', 'id');

        return json_encode($otr_certifications);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function workArea()
    {
        $work_areas = Type::ofWorkArea()
                              ->pluck('name', 'id');

        return json_encode($work_areas);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function thresholdType()
    {
        $threshold_types = Type::ofMaintenanceCycle()
                              ->pluck('name', 'id');

        return json_encode($threshold_types);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function repeatType()
    {
        $repeat_types = Type::ofMaintenanceCycle()
                            ->pluck('name', 'id');

        return json_encode($repeat_types);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function applicabilityEngine()
    {
        $applicability_engines = Category::ofItem()
                              ->pluck('name', 'id');

        return json_encode($applicability_engines);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aircraftTaskcard()
    {
        $aircraft_taskcards = Category::ofItem()
                              ->pluck('name', 'id');

        return json_encode($aircraft_taskcards);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function taskcardRelationship()
    {
        $taskcard_relationships = Taskcard::pluck('number', 'id');

        return json_encode($taskcard_relationships);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function item()
    {
        $items = Item::with('categories')
                 ->selectRaw('id, CONCAT(code, " | ", name) as name')->pluck('name','id');

        return $items;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function itemUUID()
    {
        $items = Item::with('categories')
                 ->selectRaw('uuid, CONCAT(code, " | ", name) as name')->pluck('name','uuid');

        return $items;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer()
    {
        $customers = Customer::pluck('name', 'uuid');

        return json_encode($customers);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vendor()
    {
        $vendors = Vendor::pluck('code', 'id');

        return json_encode($vendors);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function paymentTerm()
    {
        $payment_terms = Type::ofPaymentTerm()
                        ->pluck('name');

        return json_encode($payment_terms);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function scheduledPaymentType()
    {
        $scheduled_payment_type = Type::ofScheduledPayment()
                        ->pluck('name','id');

        return json_encode($scheduled_payment_type);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addressType()
    {
        $addresses = Type::ofAddress()
                        ->pluck('name', 'id');

        return json_encode($addresses);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unitType()
    {
        $units = Type::ofUnit()
                        ->pluck('name', 'id');

        return json_encode($units);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function itemUnits($item)
    {
        $item = Item::find($item);
        $unit = $item->unit()->pluck('name', 'id');
        $units = $item->units()->pluck('name', 'unit_id');
        $uom = $unit->toArray() + $units->toArray();

        return json_encode($uom);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function iterchange(Item $item)
    {
        $interchange = $item->interchanges()->pluck('name', 'uuid');

        return json_encode($interchange);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function websiteType()
    {
        $websites = Type::ofWebsite()
                        ->pluck('name', 'id');

        return json_encode($websites);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manufacturer()
    {
        $manufacturer = Manufacturer::pluck('name', 'id');

        return json_encode($manufacturer);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function taskcardType()
    {
        $taskcard_types = Type::ofTaskCardTask()
                        ->pluck('name', 'id');

        return json_encode($taskcard_types);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function taskcardTypeRoutine()
    {
        $taskcard_type_routines = Type::ofTaskCardTypeRoutine()
                        ->pluck('name', 'id');

        return json_encode($taskcard_type_routines);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function taskcardTypeNonRoutine()
    {
        $taskcard_type_non_routines = Type::ofTaskCardTypeNonRoutine()
                                    ->pluck('name', 'id');

        return json_encode($taskcard_type_non_routines);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function taskcardTypeSI()
    {
        $taskcard_type_si = Type::ofTaskCardTypeSI()->pluck('name', 'id');

        return json_encode($taskcard_type_si);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function taskcardTypePreliminary()
    {
        $taskcard_type_si = Type::ofTaskCardTypePreliminary()->pluck('name', 'id');

        return json_encode($taskcard_type_si);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function aircraft()
    {
        $aircrafts = Aircraft::pluck('name', 'id');

        return json_encode($aircrafts);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function taskType()
    {
        $task_types = Type::ofTaskCardTask()->pluck('name', 'id');

        return json_encode($task_types);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function zone()
    {
        $zones = Zone::pluck('name', 'id');

        return json_encode($zones);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function access()
    {
        $accesses = Access::pluck('name', 'id');

        return json_encode($accesses);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function scheduledPriority()
    {
        $accesses = Type::ofTaskCardEOScheduledPriority()
                    ->pluck('name', 'id');

        return json_encode($accesses);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function recurrence()
    {
        $accesses = Type::ofTaskCardEORecurrence()
                    ->pluck('name', 'id');

        return json_encode($accesses);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function manualAffected()
    {
        $accesses = Type::ofTaskCardEOManualAffected()
                    ->pluck('name', 'id');

        return json_encode($accesses);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tool()
    {
        $items = Item::with('categories')
                ->whereHas('categories', function ($query) {
                    $query->where('code', 'tool');
                })->selectRaw('id, CONCAT(code, " | ", name) as name')->pluck('name','id');

        return $items;
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function material()
    {
        $items = Item::with('categories')
                ->whereHas('categories', function ($query) {
                    $query->where('code', 'raw')->orWhere('code', 'cons')->orWhere('code', 'comp')->orWhere('code', 'service')->orWhere('code', 'facility');
                })->selectRaw('id, CONCAT(code, " | ", name) as name')->pluck('name','id');

        return $items;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function poMaterial(purchaseOrder $purchaseOrder)
    {
        $items = $purchaseOrder->items->pluck('name','uuid');

        return $items;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function project()
    {
        $projects = Project::with('approvals')->whereHas('approvals')->pluck('title','uuid');

        return json_encode($projects);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function projectQuotation()
    {
        $projects = Project::has('quotations')->pluck('title','uuid');

        return json_encode($projects);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function projectAdditional()
    {
        $projects = Project::with('approvals')->where('parent_id',null)->pluck('code','uuid');

        return json_encode($projects);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function projectAdditionalApproved()
    {
        $projects = Project::with('approvals')->where('parent_id','<>',null)->whereHas('approvals')->pluck('title','uuid');

        return json_encode($projects);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function purchaseRequestType()
    {
        $PRs = Type::where('of','purchase-request')->where('name','<>','Project')->pluck('name','uuid');

        return json_encode($PRs);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function employee()
    {
        $employees = Employee::pluck('first_name','code','id');

        return json_encode($employees);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function workOrder()
    {
        $work_order = Project::with('approvals')->whereHas('approvals')->pluck('no_wo','uuid');

        return json_encode($work_order);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function facility()
    {
        $facilities = Facility::pluck('name', 'uuid');

        return json_encode($facilities);

    }

    /**
     * Display a listing of testing resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        $websites = Type::ofWebsite()->get();

        return view('frontend.testing.repeaterBlank', [
            'websites' => $websites
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerLevel()
    {
        $customerLevel = Level::ofCustomer()
                              ->pluck('name', 'uuid');

        return json_encode($customerLevel);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function station()
    {
        $station = station::pluck('name', 'uuid');

        return json_encode($station);

    }

}
