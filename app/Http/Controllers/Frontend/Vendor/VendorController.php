<?php

namespace App\Http\Controllers\Frontend\Vendor;

use App\Models\Fax;
use App\Models\Bank;
use App\Models\Type;
use App\Models\Email;
use App\Models\Phone;
use App\Models\Vendor;
use App\Models\Document;
use App\Models\BankAccount;
use App\Helpers\DocumentNumber;
use Directoryxx\Finac\Model\Coa;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\VendorStore;
use App\Http\Requests\Frontend\VendorUpdate;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.vendor.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documents = Type::ofDocument()->get();

        return view('frontend.vendor.create',[
            'documents' => $documents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\VendorStore  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VendorStore $request)
    {
        $attentions = [];
        for ($person = 0; $person < sizeof($request->attn_name_array); $person++) {

            $contact['name']     = $request->attn_name_array[$person];
            $contact['position'] = $request->attn_position_array[$person];
            $contact['phones'] = $request->attn_phone_array[$person];
            $contact['fax'] = $request->attn_fax_array[$person];
            $contact['emails'] = $request->attn_email_array[$person];

            array_push($attentions, $contact);
        }

        $request->merge(['attention' => json_encode($attentions)]);
        $request->merge(['code' => DocumentNumber::generate('VEN-', Vendor::withTrashed()->count()+1)]);
        if ($vendor = Vendor::create($request->all())) {

            if($request->bank_account_name){
                $bank = Bank::where('uuid',$request->bank_name)->first();
                $bank_account = new BankAccount([
                    'number' => $request->bank_account_number,
                    'name' => $request->bank_account_name,
                    'swift_code' => $request->swift_code,
                    'bank_id' => $bank->id,
                ]);
                $vendor->bank_accounts()->save($bank_account);
            }

            if(is_array($request->phone_array)){
                for ($i=0; $i < sizeof($request->phone_array) ; $i++) {
                    $phone_type = Type::ofPhone()->where('code',$request->type_phone_array[$i])->first();

                    $vendor->phones()->save(new Phone([
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

                        $vendor->faxes()->save(new Fax([
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
                        $vendor->emails()->save(new Email([
                            'address' => $request->email_array[$i],
                            'type_id' => $email_type->id,
                        ]));
                    }
                }
            }

            if(is_array($request->type_document_array)){
                for ($i=0; $i < sizeof($request->type_document_array) ; $i++) {
                    if($request->website_type[$i] !== null && isset($request->document_array[$i])){
                        $document_type = Type::ofDocument()->where('uuid',$request->type_document_array[$i])->first();

                        $vendor->documents()->save(new Document([
                            'number' =>' $request->document[$i]',
                            'type_id' => $document_type->id,
                        ]));
                        }
                }
            }

            if($request->account_code){
                $vendor->coa()->save(Coa::find($request->account_code));
            }

            return response()->json($vendor);
        }

        // TODO: Return error message as JSON
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        if($vendor->coa->first()){
            $coa = $vendor->coa->first()->code.' - '.$vendor->coa->first()->name;
        }else{
            $coa = 'Search account code';
        }

        return view('frontend.vendor.show',[
            'vendor' => $vendor,
            'coa' => $coa
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        $documents = Type::ofDocument()->get();
        $attentions = json_decode($vendor->attention);
        if($vendor->coa->first()){
            $coa = $vendor->coa->first()->code.' - '.$vendor->coa->first()->name;
        }else{
            $coa = 'Search account code';
        }

        return view('frontend.vendor.edit',[
            'vendor' => $vendor,
            'documents' => $documents,
            'attentions' => $attentions,
            'coa' => $coa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Frontend\VendorUpdate  $request
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(VendorUpdate $request, Vendor $vendor)
    {
        // $vendor = Vendor::find($vendor);
        // $vendor->name = $request->name;
        // $vendor->save();
        if($request->account_code){
            if($vendor->coa()->first() == null){
                $vendor->coa()->save(Coa::find($request->account_code));
            }else{
                $vendor->coa()->first()->pivot->update(['coa_id'=> Coa::find($request->account_code)->id]);
            }
        }

        return response()->json($vendor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        $vendor->delete();

        return response()->json($vendor);
    }
}
