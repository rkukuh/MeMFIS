<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Models\Type;
use App\Models\Email;
use App\Models\Level;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CustomerStore;
use App\Http\Requests\Frontend\CustomerUpdate;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.customer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documents = Type::ofDocument()->get();
        $websites = Type::ofWebsite()->get();

        return view('frontend.customer.create', [
            'websites' => $websites,
            'documents' => $documents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\CustomerStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerStore $request)
    {
        $attentions = [];

        $level = Level::where('uuid',$request->level)->first();
        for ($person = 0; $person < sizeof($request->attn_name_array); $person++) {

            $contact['name']     = $request->attn_name_array[$person];
            $contact['position'] = $request->attn_position_array[$person];
            $contact['phones'] = $request->attn_phone_array[$person];
            $contact['ext'] = $request->attn_ext_array[$person];
            $contact['fax'] = $request->attn_fax_array[$person];
            $contact['emails'] = $request->attn_email_array[$person];

            array_push($attentions, $contact);
        }

        $request->merge(['attention' => json_encode($attentions)]);
        // $request->merge(['code' => "auto-generate");
        if ($customer = Customer::create($request->all())) {
            $customer->levels()->attach($level);

            if(is_array($request->phone_array)){
                for ($i=0; $i < sizeof($request->phone_array) ; $i++) {
                    $customer->phones()->save(new Phone([
                        'number' => $request->phone[$i],
                        'ext' => $request->ext[$i],
                        'type_id' => $request->phone_type[$i],
                    ]));
                }
            }

            if(is_array($request->fax_array)){
                for ($i=0; $i < sizeof($request->fax_array) ; $i++) {
                    $customer->faxes()->save(new Fax([
                        'number' => $request->fax[$i],
                        'type_id' => $request->fax_type[$i],
                    ]));
                }
            }

            if(is_array($request->website_array)){
                for ($i=0; $i < sizeof($request->website_array) ; $i++) {
                    if($request->website_type[$i] !== "Select a Website Type"){
                        $customer->websites()->save(new Website([
                            'url' => $request->web[$i],
                            'type_id' => $request->website_type[$i],
                        ]));
                    }
                }
            }

            if(is_array($request->email_array)){
                for ($i=0; $i < sizeof($request->email_array) ; $i++) {
                    $customer->emailes()->save(new Email([
                        'address' => $request->email[$i],
                        'type_id' => $request->email_type[$i],
                    ]));
                }
            }

            if(is_array($request->document_array)){
                for ($i=0; $i < sizeof($request->document_array) ; $i++) {
                    $customer->documentes()->save(new Document([
                        'number' => $request->document[$i],
                        'type_id' => $request->document_type[$i],
                    ]));
                }
            }

            return response()->json($customer);
        }

        // TODO: Return error message as JSON
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('frontend.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $documents = Type::ofDocument()->get();
        $websites = Type::ofWebsite()->get();

        return view('frontend.customer.edit', [
            'customer' => $customer,
            'websites' => $websites,
            'documents' => $documents
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\CustomerUpdate  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdate $request, Customer $customer)
    {
        if ($customer->update($request->all())) {
            return response()->json($customer);
        }

        // TODO: Return error message as JSON
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json($customer);
    }
}
