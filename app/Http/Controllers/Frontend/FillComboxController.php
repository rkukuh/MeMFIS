<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Item;
use App\Models\Type;
use App\Models\Unit;
use Spatie\Tags\Tag;
use App\Models\License;
use App\Models\Storage;
use App\Models\Journal;
use App\Models\Customer;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Employee;
use App\Models\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pivots\EmployeeLicense;

class FillComboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function accountCodes()
    {
        $accountCodes = Journal::pluck('code', 'id');

        return json_encode($accountCodes);

    }

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
        $units = Unit::ofQuantity()
                     ->selectRaw('id, CONCAT(name, " (", symbol ,")") as name')
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
        $taskcards = Category::ofItem()
                              ->pluck('name', 'id');

        return json_encode($taskcards);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function otrCertification()
    {
        $otr_certifications = Category::ofItem()
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
        $work_areas = Category::ofItem()
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
        $threshold_types = Category::ofItem()
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
        $repeat_types = Category::ofItem()
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
        $taskcard_relationships = Category::ofItem()
                              ->pluck('name', 'id');

        return json_encode($taskcard_relationships);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function item()
    {
        $items = Item::pluck('name', 'id');

        return json_encode($items);

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
    public function paymentTerm()
    {
        $payment_terms = Type::ofPaymentTerm()
                        ->pluck('name', 'id');

        return json_encode($payment_terms);
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

    public function test()
    {
        $websites = Type::ofWebsite()->get();

        return view('frontend.testing.repeaterBlank', [
            'websites' => $websites
        ]);
    }


}
