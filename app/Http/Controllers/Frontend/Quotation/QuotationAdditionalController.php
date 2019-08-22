<?php

namespace App\Http\Controllers\Frontend\Quotation;

use Auth;
use App\Models\Item;
use App\Models\Type;
use App\Models\Status;
use App\Models\Project;
use App\Models\JobCard;
use App\Models\Approval;
use App\Models\Customer;
use App\Models\Currency;
use App\Models\Progress;
use App\Models\Quotation;
use App\Models\DefectCard;
use App\Models\WorkPackage;
use Illuminate\Http\Request;
use App\Helpers\DocumentNumber;
use App\Models\QuotationHtcrrItem;
use App\Http\Controllers\Controller;
use App\Models\QuotationDefectCardItem;
use App\Models\Pivots\ProjectWorkPackage;
use App\Models\ProjectWorkPackageFacility;
use App\Models\Pivots\QuotationWorkPackage;
use App\Http\Requests\Frontend\QuotationStore;
use App\Http\Requests\Frontend\QuotationUpdate;
use App\Models\QuotationWorkPackageTaskCardItem;

class QuotationAdditionalController extends Controller
{
    protected $currencies;

    public function __construct()
    {
        $this->currencies = Currency::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $websites = Type::ofWebsite()->get();
        $total_manhour = $project->defectcards()->sum('estimation_manhour');

        return view('frontend.quotation.additional.create', [
            'project' => $project,
            'websites' => $websites,
            'total_manhour' => $total_manhour
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\QuotationStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contact = $defectcard_json = [];

        $contact['name']    = $request->attention_name;
        $contact['phone']   = $request->attention_phone;
        $contact['address'] = $request->attention_address;
        $contact['fax']     = $request->attention_fax;
        $contact['email']   = $request->attention_email;

        $defectcard_json["manhour_rate"] = $request->manhour_rate;
        $defectcard_json["total_manhour"] = $request->total_manhour;

        $request->merge(['number' => DocumentNumber::generate('QPRO-A-', Quotation::withTrashed()->count()+1)]);
        $request->merge(['attention' => json_encode($contact)]);
        $request->merge(['data_defectcard' => json_encode($defectcard_json)]);
        $request->merge(['project_id' => Project::where('uuid',$request->project_id)->first()->id]);
        $request->merge(['parent_id' => Project::find($request->project_id)->parent->quotations->first()->id]);
        $request->merge(['scheduled_payment_amount' => json_encode($request->scheduled_payment_amount)]);

        $quotation = Quotation::create($request->all());

        $defectcards = DefectCard::where('project_additional_id',$request->project_id)->get();
        $customer = Customer::find($quotation->parent->project->customer->id)->levels->last()->score;

        foreach($defectcards as $defectcard){
            $defectcard->quotation_additional_id = $quotation->id;
            $defectcard->save();

            foreach($defectcard->items as $item){
                if (Item::findOrFail($item->id)->prices->get($customer)) {
                    $price_id = Item::find($item->id)->prices->get($customer)->id;
                } else {
                    $price_id = null;
                }

                QuotationDefectCardItem::create([
                    'quotation_id' => $quotation->id,
                    'defectcard_id' => $defectcard->id,
                    'item_id' => $item->id,
                    'quantity' => $item->pivot->quantity,
                    'unit_id' => $item->pivot->unit_id,
                    'price_id' => $price_id,
                ]);
            }
        }

        //todo simpan origin
        $quotation->progresses()->save(new Progress([
            'status_id' =>  Status::ofQuotation()->where('code','open')->first()->id,
            'progressed_by' => Auth::id()
        ]));

        return response()->json($quotation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Quotation $quotation)
    {
        $projects = Project::get();
        $attention = json_decode($quotation->attention);
		$charges = json_decode($quotation->charge);
        return view('frontend.quotation.additional.show',[
            'charges' => $charges,
            'quotation' => $quotation,
            'project' => $quotation->project,
            'currencies' => $this->currencies,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(Quotation $quotation)
    {
        $scheduled_payment_amount = [];
        $scheduled_payment_amount = json_decode($quotation->scheduled_payment_amount);
        $charges = json_decode($quotation->charge);
        $total_manhour = $quotation->project->defectcards()->sum('estimation_manhour');
        // dd($scheduled_payment_amount);
        return view('frontend.quotation.additional.edit',[
            'charges' => $charges,
            'quotation' => $quotation,
            'project' => $quotation->project,
            'total_manhour' => $total_manhour,
            'currencies' => $this->currencies,
            'scheduled_payment_amount' => $scheduled_payment_amount,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\QuotationUpdate  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quotation $quotation)
    {
        $request->merge(['customer_id' => Project::where('uuid',$request->project_id)->first()->customer->id]);

        $attention = $defectcard_json = [];

        $attention['name']     = $request->attention_name;
        $attention['phone'] = $request->attention_phone;
        $attention['address'] = $request->attention_address;
        $attention['fax'] = $request->attention_fax;
        $attention['email'] = $request->attention_email;

        $defectcard_json["manhour_rate"] = $request->manhour_rate;
        $defectcard_json["total_manhour"] = $request->total_manhour;

        $request->charge = json_decode($request->charge);
        $request->chargeType = json_decode($request->chargeType);
        $charge = [];
        $charges = [];

        for($index = 0; $index < sizeof($request->charge) ; $index++ ){
                $charge['type'] = $request->chargeType[$index];
                $charge['amount'] = $request->charge[$index];
                array_push($charges, $charge);
        }

        $request->merge(['attention' => json_encode($attention)]);
        $request->merge(['charge' => json_encode($charges)]);
        $request->merge(['data_defectcard' => json_encode($defectcard_json)]);
        $request->merge(['scheduled_payment_amount' => json_encode($request->scheduled_payment_amount)]);
        $request->merge(['project_id' => Project::where('uuid',$request->project_id)->first()->id]);

        //TODO change
        $request->merge(['subtotal' => 0]);
        $request->merge(['grandtotal' => 0]);
        $request->merge(['ppn' => 0]);

        // dd($request->all());
        $quotation->update($request->all());

        return response()->json($quotation);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quotation $quotation)
    {
        $quotation->delete();

        return response()->json($quotation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function project($project)
    {
        return response()->json($project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function approve(Quotation $quotation)
    {
        $quotation->approvals()->save(new Approval([
            'approvable_id' => $quotation->id,
            'approved_by' => Auth::id(),
        ]));

        $quotation->progresses()->save(new Progress([
            'status_id' =>  Status::ofQuotation()->where('code','open')->first()->id,
            'progressed_by' => Auth::id()
        ]));

        $project = Project::find($quotation->project_id);
        $project->approvals()->save(new Approval([
            'approvable_id' => $project->id,
            'approved_by' => Auth::id(),
        ]));

        $project = Project::find($quotation->project_id);
        foreach($project->workpackages as $wp){
            foreach($wp->taskcards as $tc){

                if(Type::where('id',$tc->type_id)->first()->code == "basic"){
                    $tc_code = 'BSC';
                }
                else if(Type::where('id',$tc->type_id)->first()->code == "sip"){
                    $tc_code = 'SIP';
                }
                else if(Type::where('id',$tc->type_id)->first()->code == "cpcp"){
                    $tc_code = 'CPC';
                }
                else if(Type::where('id',$tc->type_id)->first()->code == "cmr"){
                    $tc_code = 'CMR';
                }
                else if(Type::where('id',$tc->type_id)->first()->code == "awl"){
                    $tc_code = 'AWL';
                }
                else if(Type::where('id',$tc->type_id)->first()->code == "ad"){
                    $tc_code = 'ADT';
                }
                else if(Type::where('id',$tc->type_id)->first()->code == "sb"){
                    $tc_code = 'SBU';
                }
                else if(Type::where('id',$tc->type_id)->first()->code == "ea"){
                    $tc_code = 'ENA';
                }
                else if(Type::where('id',$tc->type_id)->first()->code == "eo"){
                    $tc_code = 'ENO';
                }
                else if(Type::where('id',$tc->type_id)->first()->code == "si"){
                    $tc_code = 'SIT';
                }
                else if(Type::where('id',$tc->type_id)->first()->code == "preliminary"){
                    $tc_code = 'PRE';
                }
                else{
                    $tc_code = 'DUM';
                }

                $jobcard = JobCard::create([
                    'number' => DocumentNumber::generate('J'.$tc_code.'-', JobCard::withTrashed()->count()+1),
                    'taskcard_id' => $tc->id,
                    'quotation_id' => $quotation->id,
                    'origin_taskcard' => $tc->toJson(),
                    'origin_taskcard_items' => $tc->items->toJson(),
                ]);
                // // echo $tc->title.'<br>';
                // foreach($tc->items as $item){
                //     echo $item->name.'<br>';
                // }
                // dump($tc->materials->toJson());

                $jobcard->progresses()->save(new Progress([
                    'status_id' =>  Status::ofJobcard()->where('code','open')->first()->id,
                    'progressed_by' => Auth::id()
                ]));

            }

        }


        return response()->json($quotation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function discount(Request $request, Quotation $quotation)
    {
        $json_data = json_decode($quotation->data_defectcard, true);
        $json_data["discount_type"] = $request->discount_type;
        $json_data["discount_value"] = $request->discount_value;
        $json_data = json_encode($json_data);
        $quotation->update(['data_defectcard' => $json_data]);

        return response()->json($quotation);

    }

    /**
     * Search the specified resource from storage.
     *
     * @param  \App\Models\JobCard  $jobCard
     * @return \Illuminate\Http\Response
     */
    public function print(Quotation $quotation)
    {
        $username = Auth::user()->name;
        $totalCharge = $totalFacility = $totalMatTool = $manhourPrice = 0;
        if(json_decode($quotation->charge) !== null) {
            foreach(json_decode($quotation->charge) as $charge){
                $totalCharge =  $totalCharge +  $charge->amount;
            }
        }

        $workpackages = $quotation->workpackages;
        foreach($workpackages as $workPackage){
            $project_workpackage = ProjectWorkPackage::where('project_id',$quotation->project->id)
            ->where('workpackage_id',$workPackage->id)
            ->first();

            $quotation_workpackage = QuotationWorkPackage::where('quotation_id',$quotation->id)
            ->where('workpackage_id',$workPackage->id)
            ->first();

            if($project_workpackage){
                $workPackage->total_manhours_with_performance_factor = $project_workpackage->total_manhours_with_performance_factor;
                $manhourPrice += $workPackage->total_manhours_with_performance_factor & $quotation_workpackage->manhour_rate;
                $ProjectWorkPackageFacility = ProjectWorkPackageFacility::where('project_workpackage_id',$project_workpackage->id)
                ->with('facility')
                ->sum('price_amount');
                $workPackage->facilities_price_amount = $ProjectWorkPackageFacility;
                $totalFacility += $workPackage->facilities_price_amount;

                $workPackage->mat_tool_price = QuotationWorkPackageTaskCardItem::where('quotation_id',$quotation->id)->where('workpackage_id',$workPackage->id)->sum('subtotal');
                $totalMatTool += $workPackage->mat_tool_price;
            }
        }

        $pdf = \PDF::loadView('frontend/form/quotation',[
                'username' => $username,
                'quotation' => $quotation,
                'workpackages' => $workpackages,
                'totalCharge' => $totalCharge,
                'attention' => json_decode($quotation->attention),
                'GrandTotal' => $manhourPrice + $totalFacility + $totalMatTool
                ]);
        return $pdf->stream();
    }

}
