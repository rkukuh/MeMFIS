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
use App\Models\WorkPackage;
use Illuminate\Http\Request;
use App\Helpers\DocumentNumber;
use App\Models\QuotationHtcrrItem;
use App\Http\Controllers\Controller;
use App\Models\Pivots\ProjectWorkPackage;
use App\Models\ProjectWorkPackageFacility;
use App\Models\Pivots\QuotationWorkPackage;
use App\Http\Requests\Frontend\QuotationStore;
use App\Http\Requests\Frontend\QuotationUpdate;
use App\Models\QuotationWorkPackageTaskCardItem;

class QuotationController extends Controller
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
        return view('frontend.quotation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $websites = Type::ofWebsite()->get();

        return view('frontend.quotation.create', [
            'websites' => $websites
        ]);

        // return view('frontend.quotation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\QuotationStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuotationStore $request)
    {
        $contact = [];

        $contact['name']     = $request->attention_name;
        $contact['phone'] = $request->attention_phone;
        $contact['address'] = $request->attention_address;
        $contact['fax'] = $request->attention_fax;
        $contact['email'] = $request->attention_email;

        $request->merge(['number' => DocumentNumber::generate('QPRO-', Quotation::count()+1)]);
        $request->merge(['attention' => json_encode($contact)]);
        $request->merge(['project_id' => Project::where('uuid',$request->project_id)->first()->id]);

        $quotation = Quotation::create($request->all());
        $project = Project::where('id',$request->project_id)->first();

        foreach ($project->workpackages as $workpackage){
            $quotation->workpackages()->attach(WorkPackage::where('uuid',$workpackage->uuid)->first()->id);
        }

        $quotation->progresses()->save(new Progress([
            'status_id' =>  Status::ofQuotation()->where('code','open')->first()->id,
            'progressed_by' => Auth::id()
        ]));

        // TODO generate item workpackage
        $customer = Customer::where('uuid',$request->customer_id)->first()->levels->last()->score;
        $project = Project::find($request->project_id);
            foreach($project->workpackages as $workpackage){
                foreach($workpackage->items as $item){

                    $quotation_workpackage_item = QuotationWorkPackage::where('quotation_id',$quotation->id)->where('workpackage_id',$workpackage->id)->first();

                    if (Item::findOrFail($item->id)->prices->get($customer)) {
                        $price_id = Item::find($item->id)->prices->get($customer)->id;
                    } else {
                        $price_id = null;
                    }
                    $quotation_workpackage_item->items()->create([
                        'item_id' => $item->id,
                        'quantity' => $item->pivot->quantity,
                        'unit_id' => $item->pivot->unit_id,
                        'price_id' => $price_id,
                    ]);
                }
            }

        // TODO generate htcrr item workpackage
        $customer = Customer::where('uuid',$request->customer_id)->first()->levels->last()->score;
        $project = Project::find($request->project_id);
            foreach($project->htcrr as $htcrr){
                foreach($htcrr->items as $item){

                    if (Item::findOrFail($item->id)->prices->get($customer)) {
                        $price_id = Item::find($item->id)->prices->get($customer)->id;
                    } else {
                        $price_id = null;
                    }
                    QuotationHtcrrItem::create([
                        'quotation_id' => $quotation->id,
                        'htcrr_id' => $htcrr->id,
                        'item_id' => $item->id,
                        'quantity' => $item->pivot->quantity,
                        'unit_id' => $item->pivot->unit_id,
                        'price_id' => $price_id,
                    ]);
                }
            }

        // TODO generate item taskcard
        $customer = Customer::where('uuid',$request->customer_id)->first()->levels->last()->score;
        $project = Project::find($request->project_id);
            foreach($project->workpackages as $workpackages){
                foreach($workpackages->taskcards as $taskcard){
                    foreach($taskcard->items as $item){
                        // $quotation_taskcard_item = QuotationTaskCard::where('quotation_id',$quotation->id)->where('workpackage_id',$workpackage->id)->first();

                        if (Item::findOrFail($item->id)->prices->get($customer)) {
                            $price_id = Item::find($item->id)->prices->get($customer)->id;
                        } else {
                            $price_id = null;
                        }
                        QuotationWorkPackageTaskCardItem::create([
                            'quotation_id' => $quotation->id,
                            'workpackage_id' => $workpackages->id,
                            'taskcard_id' => $taskcard->id,
                            'item_id' => $item->id,
                            'quantity' => $item->pivot->quantity,
                            'unit_id' => $item->pivot->unit_id,
                            'price_id' => $price_id,
                        ]);
                    }
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
    public function show(Quotation $quotation)
    {
        $projects = Project::get();
        $attention = json_decode($quotation->attention);
		$charges = json_decode($quotation->charge);
        return view('frontend.quotation.show',[
            'currencies' => $this->currencies,
            'quotation' => $quotation,
            'charges' => $charges,
            'projects' => $projects
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
        $projects = Project::get();
        $scheduled_payment_amount = json_decode($quotation->scheduled_payment_amount);
        $charges = json_decode($quotation->charge);
        return view('frontend.quotation.edit',[
            'currencies' => $this->currencies,
            'quotation' => $quotation,
            'charges' => $charges,
            'scheduled_payment_amount' => $scheduled_payment_amount,
            'projects' => $projects
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\QuotationUpdate  $request
     * @param  \App\Models\Quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(QuotationUpdate $request, Quotation $quotation)
    {
        $attention = [];

        $attention['name']     = $request->attention_name;
        $attention['phone'] = $request->attention_phone;
        $attention['address'] = $request->attention_address;
        $attention['fax'] = $request->attention_fax;
        $attention['email'] = $request->attention_email;

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
        // $request->merge(['scheduled_payment_amount' => json_encode($request->scheduled_payment_amount)]);
        $request->merge(['project_id' => Project::where('uuid',$request->project_id)->first()->id]);
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
                    'number' => DocumentNumber::generate('J'.$tc_code.'-', JobCard::count()+1),
                    'taskcard_id' => $tc->id,
                    'quotation_id' => $quotation->id,
                    'data_taskcard' => $tc->toJson(),
                    'data_taskcard_items' => $tc->items->toJson(),
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
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function discount( Request $request, Quotation $quotation, WorkPackage $workpackage)
    {
        // dd($workpackage);
        // $Quotation->workpackages()->updateExistingPivot($WorkPackage, ['discount_value'=>$request->discount_value]);
        $quotation->workpackages()->updateExistingPivot($workpackage, ['discount_type'=>$request->discount_type,'discount_value'=>$request->discount_value]);

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
