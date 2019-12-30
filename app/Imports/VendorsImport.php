<?php

namespace App\Imports;

use Directoryxx\Finac\Model\Coa;
use App\Models\Fax;
use App\Models\Type;
use App\Models\Bank;
use App\Models\Email;
use App\Models\Phone;
use App\Models\Vendor;
use App\Models\BankAccount;
use App\Helpers\DocumentNumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Faker as Faker;

class VendorsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $attentions = [];
        // for ($person = 0; $person < sizeof($row->attn_name_array); $person++) {

        //     $contact['name']     = $row->attn_name_array[$person];
        //     $contact['position'] = $row->attn_position_array[$person];
        //     $contact['phones'] = $row->attn_phone_array[$person];
        //     $contact['fax'] = $row->attn_fax_array[$person];
        //     $contact['emails'] = $row->attn_email_array[$person];

        //     array_push($attentions, $contact);
        // }

        // $row->merge(['attention' => json_encode($attentions)]);
        $code = DocumentNumber::generate('VEN-', Vendor::withTrashed()->whereYear('created_at', date("Y"))->count()+1);

        if ($vendor = Vendor::create([
            'code' => $code,
            'name' => $row['name'],
            'attention' => json_encode($attentions, true),
            'payment_terp' => $row['top']
        ])) {

            if($row['bank_account_name']){
                $bank = Bank::where('uuid',$row['bank_name'])->first();
                $bank_account = new BankAccount([
                    'number' => $row['bank_account_number'],
                    'name' => $row['bank_account_name'],
                    'swift_code' => $row['swift_code'],
                    'bank_id' => $bank->id,
                ]);
                $vendor->bank_accounts()->save($bank_account);
            }

            if($row['phone']){
                $phone_type = Type::ofPhone()->where('name',$row['phone_type'])->first();

                $vendor->phones()->save(new Phone([
                    'number' => $row['phone'],
                    'ext' => $row['ext'],
                    'type_id' => $phone_type->id,
                ]));
            }

            if($row['fax']){
                if($row['fax']){
                    $fax_type = Type::ofFax()->where('code',$row['fax_type'])->first();

                    $vendor->faxes()->save(new Fax([
                        'number' => $row['fax'],
                        'type_id' => $fax_type->id,
                    ]));
                }
            }

            if($row['email']){
                if(($row['email'])){
                    $email_type = Type::ofEmail()->where('code',$row['email_type'])->first();
                    
                    $vendor->emails()->save(new Email([
                        'address' => $row['email'],
                        'type_id' => $email_type->id,
                    ]));
                }
            }

            if($row['address']){
                $vendor->addresses()->create([
                    'address' => $row['address'],
                    'type_id' => Type::where('of','address')->where('code','primary')->first()->id,
                ]);
            }


            $coa = Coa::where('code', $row['coa'])->first();

            if($coa){
                $vendor->coa()->save($coa);
            }

        }

        // TODO: Return error message as JSON
    }

}
