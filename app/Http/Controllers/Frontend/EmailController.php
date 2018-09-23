<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Email;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\EmailStore;
use App\Http\Requests\Frontend\EmailUpdate;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = Email::pluck('name', 'id');

        return json_encode($emails);
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
     * @param  \App\Http\Requests\Frontend\EmailStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailStore $request)
    {
        $email = Email::create([
            // 'abbr' => $request->abbr,
            // 'name' => $request->name,
        ]);

        return response()->json($email);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\EmailUpdate  $request
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(EmailUpdate $request, Email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy(Email $email)
    {
        //
    }
}
