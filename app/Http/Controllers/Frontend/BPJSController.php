<?php

namespace App\Http\Controllers\Frontend;

use App\Models\BpjsHistory;
use App\Models\BPJS;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\BPJSStore;
use App\Http\Requests\Frontend\BPJSUpdate;

class BPJSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.benefit.bpjs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.benefit.bpjs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\BPJSStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BPJSStore $request)
    {
        $bpjs = BPJS::create($request->all());

        // TODO: Return error message as JSON
        return response()->json($bpjs);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BPJS  $bPJS
     * @return \Illuminate\Http\Response
     */
    public function show(BPJS $bpj)
    {
        $history = BpjsHistory::where('bpjs_id',$bpj->id)->with('bpjs')->get();
        
        return view('frontend.benefit.bpjs.show',['bpjs' => $bpj,'history' => $history]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BPJS  $bPJS
     * @return \Illuminate\Http\Response
     */
    public function edit(BPJS $bpj)
    {
        $history = BpjsHistory::where('bpjs_id',$bpj->id)->with('bpjs')->get();

        return view('frontend.benefit.bpjs.edit',['bpjs' => $bpj,'history' => $history]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\BPJSUpdate  $request
     * @param  \App\Models\BPJS  $bPJS
     * @return \Illuminate\Http\Response
     */
    public function update(BPJSUpdate $request, BPJS $bpj)
    {

        $id = BPJS::where('uuid',$bpj->uuid)->first()->id;
        $data = BPJS::where('uuid',$bpj->uuid)->first();
        $time_now = Carbon::now();

        BpjsHistory::create([
            'bpjs_id' => $id,
            'code' => $data->code,
            'name' => $data->name,
            'employee_paid' => $data->emoployee_paid,
            'employee_min_value' => $data->employee_min_value,
            'employee_max_value' => $data->employee_max_value,
            'company_paid' => $data->company_paid,
            'company_min_value' => $data->company_min_value,
            'company_max_value' => $data->company_max_value,
            'created_at' => $data->created_at->toDateTimeString(),
            'updated_at' => $time_now
        ]);

        $bpj->update([
            'code' => $request->code,
            'name' => $request->name,
            'employee_paid' => $request->employee_paid,
            'employee_min_value' => $request->min_employee,
            'employee_max_value' => $request->max_employee,
            'company_paid' => $request->company_paid,
            'company_min_value' => $request->min_company,
            'company_max_value' => $request->max_company,
            'created_at' => $time_now,
            'updated_at' => $time_now
        ]);

        return response()->json($bpj);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BPJS  $bPJS
     * @return \Illuminate\Http\Response
     */
    public function destroy(BPJS $bPJS)
    {
        //
    }
}
