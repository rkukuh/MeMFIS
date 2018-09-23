<?php

namespace App\Http\Controllers\Frontend;

use App\model\ListUtil;
use App\Models\BankAccount;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\BankAccountStore;
use App\Http\Requests\Frontend\BankAccountUpdate;

class BankAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bankAccounts = BankAccount::pluck('name', 'id');

        return json_encode($bankAccounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\BankAccountStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankAccountStore $request)
    {
        $BankAccount = BankAccount::create([
            // 'abbr' => $request->abbr,
            // 'name' => $request->name,
        ]);

        return response()->json($BankAccount);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function show(BankAccount $bankAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(BankAccount $bankAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\BankAccountUpdate  $request
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function update(BankAccountUpdate $request, BankAccount $bankAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BankAccount  $bankAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(BankAccount $bankAccount)
    {
        //
    }
}
