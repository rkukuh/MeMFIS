<?php

namespace App\Http\Controllers\Frontend;

use App\Models\ListUtil;
use App\Models\Customer;
use App\Models\Type;
use App\Models\Email;
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
        $websites = Type::ofWebsite()
        ->get();

        return view('frontend.customer.create', [
            'websites' => $websites
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
        if ($customer = Customer::create($request->all())) {
            // $item->emails()->attach($request->email_array);
            // $customer->emails()->attach($customer->id, ['address' => $request->email_array]);
            // $customer->emails()->saveMany([Email::class, ['address' => $request->email_array]]);
            // $employee->emails()->saveMany(factory(Email::class, rand(1, 2))->make());
            // Email::class, rand(1, 2)
            $email = Email::class(['address' => $request->email_array]);
            $email = $customer->emails()->save($email);
            return response()->json($customer);
        }

        return false;

    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($customer)
    {
        $customer = Customer::with('term_of_payment')->where('uuid',$customer)->first();

        return view('frontend.customer.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {

        $payment_terms = Type::ofPaymentTerm()->get();

        return view('frontend.customer.edit', [
            'customer' => $customer,
            'payment_terms' => $payment_terms,
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
            // $customer->categories()->sync($request->category);

            // $customer->tags()->sync($request->selectedtags);

            return response()->json($customer);
        }

        // TODO: Return error message as JSON
        return false;

        // $customer = Customer::find($customer);
        // $customer->name = $request->name;
        // $customer->save();

        // return response()->json($customer);
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

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function details(Customer $customer)
    {
        return response()->json($customer);
    }

}
