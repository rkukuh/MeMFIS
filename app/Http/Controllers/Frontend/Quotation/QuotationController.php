<?php

namespace App\Http\Controllers\Frontend\Quotation;


use App\Models\Type;
use App\Models\Project;
use App\Models\Customer;
use App\Models\Currency;
use App\Models\Quotation;
use App\Models\WorkPackage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\QuotationStore;
use App\Http\Requests\Frontend\QuotationUpdate;

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
        $request->merge(['project_id' => Project::where('uuid',$request->project_id)->first()->id]);
        $request->merge(['customer_id' => Customer::where('uuid',$request->customer_id)->first()->id]);

        $quotation = Quotation::create($request->all());
        $project = Project::where('id',$request->project_id)->first();

        foreach ($project->workpackages as $workpackage){
            $quotation->workpackages()->attach(WorkPackage::where('uuid',$workpackage->uuid)->first()->id);
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

        return view('frontend.quotation.show',[
            'currencies' => $this->currencies,
            'quotation' => $quotation,
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

        return view('frontend.quotation.edit',[
            'currencies' => $this->currencies,
            'quotation' => $quotation,
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
        $request->merge(['project_id' => Project::where('uuid',$request->project_id)->first()->id]);
        $request->merge(['customer_id' => Customer::where('uuid',$request->customer_id)->first()->id]);

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

}
