<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Models\Type;
use App\Models\Email;
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
        $websites = Type::ofWebsite()->get();

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
            // $email = Email::class(['address' => $request->email_array]);
            // $email = $customer->emails()->save($email);

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
        $customer = Customer::with('term_of_payment')->find($customer);

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
        $websites = Type::ofWebsite()->get();
        $payment_terms = Type::ofPaymentTerm()->get();

        return view('frontend.customer.edit', [
            'customer' => $customer,
            'websites' => $websites
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
