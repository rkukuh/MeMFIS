<?php

namespace App\Http\Controllers\Frontend\Customer;

use Carbon\Carbon;
use App\Models\Fax;
use App\Models\Type;
use App\Models\Email;
use App\Models\Level;
use App\Models\Phone;
use App\Models\Website;
use App\Models\Customer;
use App\Models\Document;
use App\Helpers\DocumentNumber;
use Directoryxx\Finac\Model\Coa;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\CustomerStore;
use App\Http\Requests\Frontend\CustomerUpdate;
// use function GuzzleHttp\json_decode;

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
            $contact['fax'] = $request->attn_fax_array[$person];
            $contact['emails'] = $request->attn_email_array[$person];

            array_push($attentions, $contact);
        }

        $request->merge(['attention' => json_encode($attentions)]);
        $request->merge(['code' => DocumentNumber::generate('CUS-', Customer::withTrashed()->count()+1)]);
        if ($customer = Customer::create($request->all())) {
            $customer->levels()->attach($level);


            if(is_array($request->website_array)){
                $customer->websites()->delete();
                for ($i=0; $i < sizeof($request->website_array) ; $i++) {
                    if(isset($request->website_array[$i])){
                        $website_type = Type::ofWebsite()->where('uuid',$request->type_website_array[$i])->first();
                        $customer->websites()->save(new Website([
                            'url' => $request->website_array[$i],
                            'type_id' => $website_type->id,
                            ]));
                        }
                }
            }

            if(is_array($request->phone_array)){
                for ($i=0; $i < sizeof($request->phone_array) ; $i++) {
                    $phone_type = Type::ofPhone()->where('code',$request->type_phone_array[$i])->first();

                    $customer->phones()->save(new Phone([
                        'number' => $request->phone_array[$i],
                        'ext' => $request->ext_phone_array[$i],
                        'type_id' => $phone_type->id,
                    ]));
                }
            }

            if(is_array($request->fax_array)){
                for ($i=0; $i < sizeof($request->fax_array) ; $i++) {
                    if(isset($request->fax_array[$i])){
                        $fax_type = Type::ofFax()->where('code',$request->type_fax_array[$i])->first();

                        $customer->faxes()->save(new Fax([
                            'number' => $request->fax_array[$i],
                            'type_id' => $fax_type->id,
                        ]));
                    }
                }
            }

            if(is_array($request->email_array)){
                for ($i=0; $i < sizeof($request->email_array) ; $i++) {
                    if(isset($request->email_array[$i])){
                        $email_type = Type::ofEmail()->where('code',$request->type_email_array[$i])->first();
                        $customer->emails()->save(new Email([
                            'address' => $request->email_array[$i],
                            'type_id' => $email_type->id,
                        ]));
                    }
                }
            }

            // if(is_array($request->document_array)){
            if(is_array($request->type_document_array)){
                for ($i=0; $i < sizeof($request->type_document_array) ; $i++) {
                    if($request->website_type[$i] !== null && isset($request->document_array[$i])){
                        $document_type = Type::ofDocument()->where('uuid',$request->type_document_array[$i])->first();

                        $customer->documents()->save(new Document([
                            'number' =>' $request->document[$i]',
                            'type_id' => $document_type->id,
                        ]));
                        }
                }
            }

            $customer->coa()->save(Coa::find($request->account_code));


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
        $documents = Type::ofDocument()->get();
        $websites = Type::ofWebsite()->get();
        $attentions = json_decode($customer->attention);
        return view('frontend.customer.show', [
            'customer' => $customer,
            'attentions' => $attentions,
            'websites' => $websites,
            'documents' => $documents,
            'coa' => $customer->coa->first()
        ]);
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
        $attentions = json_decode($customer->attention);
        $levels = Level::where('of','customer')->get();

        return view('frontend.customer.edit', [
            'customer' => $customer,
            'attentions' => $attentions,
            'websites' => $websites,
            'levels' => $levels,
            'documents' => $documents,
            'coa' => $customer->coa->first()
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
        $attentions = [];
        $level = Level::where('uuid',$request->level)->first();
        for ($person = 0; $person < sizeof($request->attn_name_array); $person++) {

            $contact['name']     = $request->attn_name_array[$person];
            $contact['position'] = $request->attn_position_array[$person];
            $contact['phones'] = $request->attn_phone_array[$person];
            $contact['fax'] = $request->attn_fax_array[$person];
            $contact['emails'] = $request->attn_email_array[$person];

            array_push($attentions, $contact);
        }

        $request->merge(['attention' => json_encode($attentions)]);
        if($request->active == "on"){
            $request->merge(['banned_at' => null]);
        }else{
            $request->merge(['banned_at' => Carbon::now() ]);
        }
        if ($customer->update($request->all())) {

            $customer->levels()->attach($level);

            if(is_array($request->website_array)){
                $customer->websites()->delete();
                for ($i=0; $i < sizeof($request->website_array) ; $i++) {
                    if(isset($request->website_array[$i])){
                        $website_type = Type::ofWebsite()->where('uuid',$request->type_website_array[$i])->first();
                        $customer->websites()->save(new Website([
                            'url' => $request->website_array[$i],
                            'type_id' => $website_type->id,
                            ]));
                        }
                }
            }

            if(is_array($request->phone_array)){
                $customer->phones()->delete();
                for ($i=0; $i < sizeof($request->phone_array) ; $i++) {
                    $phone_type = Type::ofPhone()->where('code',$request->type_phone_array[$i])->first();
                    $customer->phones()->save(new Phone([
                        'number' => $request->phone_array[$i],
                        'ext' => $request->ext_phone_array[$i],
                        'type_id' => $phone_type->id,
                    ]));
                }
            }

            if(is_array($request->fax_array)){
                $customer->faxes()->delete();
                for ($i=0; $i < sizeof($request->fax_array) ; $i++) {
                    if(isset($request->fax_array[$i])){
                        $fax_type = Type::ofFax()->where('code',$request->type_fax_array[$i])->first();
                        $customer->faxes()->save(new Fax([
                            'number' => $request->fax_array[$i],
                            'type_id' => $fax_type->id,
                        ]));
                    }
                }
            }

            if(is_array($request->email_array)){
                $customer->emails()->delete();
                for ($i=0; $i < sizeof($request->email_array) ; $i++) {
                    if (isset($request->email_array[$i])) {
                        $email_type = Type::ofEmail()->where('code', $request->type_email_array[$i])->first();
                        $customer->emails()->save(new Email([
                            'address' => $request->email_array[$i],
                            'type_id' => $email_type->id,
                        ]));
                    }
                }
            }

            if(is_array($request->type_document_array)){
                $customer->documents()->delete();
                for ($i=0; $i < sizeof($request->type_document_array) ; $i++) {
                    if($request->website_type[$i] !== null && isset($request->document_array[$i])){
                        $document_type = Type::ofDocument()->where('uuid',$request->type_document_array[$i])->first();
                        $customer->documents()->save(new Document([
                            'number' =>' $request->document[$i]',
                            'type_id' => $document_type->id,
                        ]));
                        }
                }
            }
            $customer->coa()->first()->pivot->update(['coa_id'=> Coa::find($request->account_code)->id]);

        }

        // TODO: Return error message as JSON
        return response()->json($customer);
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
