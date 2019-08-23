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
use App\Models\QuotationWorkPackageItem;
use App\Models\Pivots\ProjectWorkPackage;
use App\Models\ProjectWorkPackageTaskCard;
use App\Models\ProjectWorkPackageFacility;
use App\Models\Pivots\QuotationWorkPackage;
use App\Http\Requests\Frontend\QuotationStore;
use App\Models\ProjectWorkPackageEOInstruction;
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

        $request->merge(['number' => DocumentNumber::generate('QPRO-', Quotation::withTrashed()->count()+1)]);
        $request->merge(['attention' => json_encode($contact)]);
        $request->merge(['project_id' => Project::where('uuid',$request->project_id)->first()->id]);

        $quotation = Quotation::create($request->all());
        $project = Project::where('id',$request->project_id)->first();

        foreach ($project->workpackages as $workpackage){
            $quotation->workpackages()->attach(WorkPackage::where('uuid',$workpackage->uuid)->first()->id);
        }

        // $quotation->progresses()->save(new Progress([
        //     'status_id' =>  Status::ofQuotation()->where('code','open')->first()->id,
        //     'progressed_by' => Auth::id()
        // ]));

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
            foreach($project->htcrrs as $htcrr){
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
        $project_workpackages = ProjectWorkPackage::where('project_id',$request->project_id)->get();

        foreach($project_workpackages as $workpackage){
            foreach($workpackage->taskcards as $taskcard){
                foreach($taskcard->taskcard->items as $item){
                    if (Item::findOrFail($item->id)->prices->get($customer)) {
                        $price_id = Item::find($item->id)->prices->get($customer)->id;
                    } else {
                        $price_id = null;
                    }

                    if($price_id <> null){
                        $selling_price = Item::find($item->id)->prices->get($customer)->amount;
                    }
                    else{
                        $selling_price = null;
                    }

                    QuotationWorkPackageTaskCardItem::create([
                        'quotation_id' => $quotation->id,
                        'workpackage_id' => $workpackage->workpackage_id,
                        'taskcard_id' => $taskcard->taskcard->id,
                        'item_id' => $item->id,
                        'quantity' => $item->pivot->quantity,
                        'unit_id' => $item->pivot->unit_id,
                        'price_id' => $price_id,
                        'price_amount' => $selling_price,
                    ]);
                }
            }
            foreach($workpackage->eo_instructions as $eo_instruction){
                foreach($eo_instruction->eo_instruction->items as $item){
                    if (Item::findOrFail($item->id)->prices->get($customer)) {
                        $price_id = Item::find($item->id)->prices->get($customer)->id;
                    } else {
                        $price_id = null;
                    }

                    if($price_id <> null){
                        $selling_price = Item::find($item->id)->prices->get($customer)->amount;
                    }
                    else{
                        $selling_price = null;
                    }

                    QuotationWorkPackageTaskCardItem::create([
                        'quotation_id' => $quotation->id,
                        'workpackage_id' => $workpackage->workpackage_id,
                        'taskcard_id' => $eo_instruction->eo_instruction->eo_header->id,
                        'eo_instruction_id' => $eo_instruction->eo_instruction->id,
                        'item_id' => $item->id,
                        'quantity' => $item->pivot->quantity,
                        'unit_id' => $item->pivot->unit_id,
                        'price_id' => $price_id,
                        'price_amount' => $selling_price,
                    ]);
                }
            }
        }


            dd('s');
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
            'attention' => $attention,
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

        // $qw_json = $quotation->workpackages->toJson();

        // $qw = QuotationWorkPackage::where('quotation_id',$quotation->id)->pluck('id');

        // $qwe = QuotationWorkPackageItem::whereIn('quotation_workpackage_id',$qw)->get();
        // $qwe_json = $qwe->toJson();

        // $qwf = QuotationWorkPackageTaskCardItem::where('quotation_id',$quotation->id)->get();
        // $qwf_json = $qwf->toJson();

        // $qwm = QuotationHtcrrItem::where('quotation_id',$quotation->id)->get();
        // $qwm_json = $qwm->toJson();

        // $quotation->origin_quotation = $quotation->toJson();
        // $quotation->origin_quotation_workpackages = $qw_json;
        // $quotation->origin_quotation_workpackage_items = $qwe_json;
        // $quotation->origin_quotation_workpackage_taskcard_items = $qwf_json;
        // $quotation->origin_quotation_htcrr_items = $qwm_json;
        // $quotation->save();

        // $quotation->approvals()->save(new Approval([
        //     'approvable_id' => $quotation->id,
        //     'approved_by' => Auth::id(),
        // ]));

        // $quotation->progresses()->save(new Progress([
        //     'status_id' =>  Status::ofQuotation()->where('code','open')->first()->id,
        //     'progressed_by' => Auth::id()
        // ]));

        // $project = Project::find($quotation->project_id);
        // $project->progresses()->save(new Progress([
        //     'status_id' =>  Status::ofProject()->where('code','open')->first()->id,
        //     'progressed_by' => Auth::id()
        // ]));

        // $project->approvals()->save(new Approval([
        //     'approvable_id' => $project->id,
        //     'approved_by' => Auth::id(),
        // ]));

        $ProjectWorkPackage = ProjectWorkPackage::where('project_id',$quotation->project_id)->pluck('id');
        $ProjectWorkPackageTaskCard = ProjectWorkPackageTaskCard::whereIn('project_workpackage_id',$ProjectWorkPackage)->get();
        foreach($ProjectWorkPackageTaskCard as $taskcard){
                $tc = $taskcard->taskcard;

                if(Type::where('id',$tc->type_id)->first()->code == "basic"){
                    $tc_code = 'BSC';
                }
                else if(Type::where('id',$tc->type_id)->first()->code == "sip"){
                    $tc_code = 'SIP';
                }
                else if(Type::where('id',$tc->type_id)->first()->code == "cpcp"){
                    $tc_code = 'CPC';
                }
                else{
                    $tc_code = 'DUM';
                }

                if($tc_code == "BSC" or $tc_code == "SIP" or $tc_code == "CPC" or $tc_code == "SIT" or $tc_code == "PRE" or $tc_code == "DUM"){

                    $jobcard = $tc->jobcards()->create([
                        'number' => DocumentNumber::generate('J'.$tc_code.'-', JobCard::withTrashed()->count()+1),
                        'jobcardable_id' => $tc->id,
                        'quotation_id' => $quotation->id,
                        'is_rii' => $taskcard->is_rii,
                        'is_mandatory' => $taskcard->is_mandatory,
                        'station_id' => null,
                        'entered_in' => null,
                        'additionals' => null,
                        'origin_quotation' => null,
                        'origin_jobcardable' => $tc->toJson(),
                        'origin_jobcardable_items' => $tc->items->toJson(),
                        'origin_jobcard_helpers' => null,
                    ]);

                    $jobcard->progresses()->save(new Progress([
                        'status_id' =>  Status::ofJobcard()->where('code','open')->first()->id,
                        'progressed_by' => Auth::id()
                    ]));

                }
                // else{
                //     foreach($tc->eo_instructions as $instruction){
                //         // $jobcard = JobCard::create([
                //         //     'number' => DocumentNumber::generate('J'.$tc_code.'-', JobCard::withTrashed()->count()+1),
                //         //     'taskcard_id' => $tc->id,
                //         //     'quotation_id' => $quotation->id,
                //         //     'origin_taskcard' => $tc->toJson(),
                //         //     'origin_taskcard_items' => $tc->items->toJson(),
                //         // ]);
                //         $jobcard = $instruction->jobcards()->create([
                //             'number' => DocumentNumber::generate('J'.$tc_code.'-', JobCard::withTrashed()->count()+1),
                //             'jobcardable_id' => $instruction->id,
                //             'quotation_id' => $quotation->id,
                //             'is_rii' => $taskcard->is_rii,
                //             'is_mandatory' => $taskcard->is_mandatory,
                //             'station_id' => null,
                //             'entered_in' => null,
                //             'additionals' => null,
                //             'origin_quotation' => null,
                //             'origin_jobcardable' => $instruction->toJson(),
                //             'origin_jobcardable_items' => $instruction->items->toJson(),
                //             'origin_jobcard_helpers' => null,

                //         ]);


                //         $jobcard->progresses()->save(new Progress([
                //             'status_id' =>  Status::ofJobcard()->where('code','open')->first()->id,
                //             'progressed_by' => Auth::id()
                //         ]));
                //     }

                // }

                // // echo $tc->title.'<br>';
                // foreach($tc->items as $item){
                //     echo $item->name.'<br>';
                // }
                // dump($tc->materials->toJson());



        //     }

        $ProjectWorkPackageTaskCard = ProjectWorkPackageEOInstruction::whereIn('project_workpackage_id',$ProjectWorkPackage)->get();
        foreach($ProjectWorkPackageTaskCard as $eo_instruction){
                $tc = $eo_instruction->eo_instruction->eo_header;

                if(Type::where('id',$tc->type_id)->first()->code == "cmr"){
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

                $jobcard = $tc->jobcards()->create([
                    'number' => DocumentNumber::generate('J'.$tc_code.'-', JobCard::withTrashed()->count()+1),
                    'jobcardable_id' => $tc->id,
                    'quotation_id' => $quotation->id,
                    'is_rii' => $eo_instruction->is_rii,
                    'is_mandatory' => $eo_instruction->is_mandatory,
                    'station_id' => null,
                    'entered_in' => null,
                    'additionals' => null,
                    'origin_quotation' => null,
                    'origin_jobcardable' => $eo_instruction->eo_instruction->toJson(),
                    'origin_jobcardable_items' => $eo_instruction->eo_instruction->items->toJson(),
                    'origin_jobcard_helpers' => null,
                ]);

                $jobcard->progresses()->save(new Progress([
                    'status_id' =>  Status::ofJobcard()->where('code','open')->first()->id,
                    'progressed_by' => Auth::id()
                ]));

                // // echo $tc->title.'<br>';
                // foreach($tc->items as $item){
                //     echo $item->name.'<br>';
                // }
                // dump($tc->materials->toJson());



            }

        }
        foreach($project->htcrrs as $htcrr){
            if($htcrr->parent_id == null){
                $htcrr->progresses()->save(new Progress([
                    'status_id' =>  Status::where('code','removal-open')->first()->id,
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
        $discount = $rowTotal = $totalCharge = $totalFacility = $totalMatTool = $manhourPrice = [];

        if(json_decode($quotation->charge) !== null) {
            foreach(json_decode($quotation->charge) as $charge){
                array_push($totalCharge, $charge->amount);
            }
        }

        $workpackages = $quotation->workpackages;
        foreach($workpackages as $key => $workPackage){
            $project_workpackage = ProjectWorkPackage::where('project_id',$quotation->project->id)
            ->where('workpackage_id',$workPackage->id)
            ->first();

            $quotation_workpackage = QuotationWorkPackage::where('quotation_id',$quotation->id)
            ->where('workpackage_id',$workPackage->id)
            ->first();

            if($project_workpackage){
                //total manhour price
                $workPackage->total_manhours_with_performance_factor = $project_workpackage->total_manhours_with_performance_factor;
                array_push($manhourPrice, $workPackage->total_manhours_with_performance_factor * $quotation_workpackage->manhour_rate);

                //totalfacility price
                $ProjectWorkPackageFacility = ProjectWorkPackageFacility::where('project_workpackage_id',$project_workpackage->id)
                ->with('facility')
                ->sum('price_amount');
                $workPackage->facilities_price_amount = $ProjectWorkPackageFacility;
                array_push($totalFacility, $workPackage->facilities_price_amount);

                //items price
                $workPackage->mat_tool_price = QuotationWorkPackageTaskCardItem::where('quotation_id',$quotation->id)->where('workpackage_id',$workPackage->id)->sum('subtotal');
                array_push($totalMatTool, $workPackage->mat_tool_price);
            }

            if($quotation_workpackage){
                switch($quotation_workpackage->discount_type){
                    case "amount":
                        array_push($discount, $quotation_workpackage->discount_value);
                        break;
                    case "percentage":
                        array_push($discount, ($manhourPrice[$key] + $totalFacility[$key] + $totalMatTool[$key]) * ($quotation_workpackage->discount_value / 100) );
                        break;
                    default:
                        array_push($discount, 0);
                }
            }
        }

        $pdf = \PDF::loadView('frontend/form/quotation',[
                'username' => $username,
                'quotation' => $quotation,
                'subTotal' => array_sum($manhourPrice) + array_sum($totalFacility) + array_sum($totalMatTool),
                'workpackages' => $workpackages,
                'totalCharge' => array_sum($totalCharge),
                'attention' => json_decode($quotation->attention),
                'discount' => array_sum($discount)
                ]);

        return $pdf->stream();
    }

}
