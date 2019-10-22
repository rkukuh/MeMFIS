<?php

namespace App\Imports;

use App\Models\Fax;
use App\Models\Type;
use App\Models\Email;
use App\Models\Level;
use App\Models\Phone;
use App\Models\Website;
use App\Models\Customer;
use App\Models\Address;
use App\Helpers\DocumentNumber;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $level = Level::ofCustomer()->where('score', $row['level'])->first();

        $attentions = [];
        $attn_phones = explode(";", $row["attn_phone"]);
        $attn_emails = explode(";", $row["attn_email"]);

        $contact['emails']   = $attn_emails;
        $contact['phones']   = $attn_phones;
        $contact['name']     = $row["attention"];
        $contact['fax']      = $row["attn_fax"];
        $contact['ext']      = $row["attn_ext"];
        $contact['position'] = $row["jabatan"];
        array_push($attentions, $contact);

        $customer = Customer::create([
            'name' => $row['name'],
            'code' =>  DocumentNumber::generate('CUS-', Customer::withTrashed()->count()+1),
            'attention' => json_encode($attentions),
            'payment_term' => $row['term_of_payment'],
        ]);

        if ($customer) {
            $customer->levels()->attach($level);

            $types = explode(";", $row["website_type"]);
            $urls = explode(";", $row["website"]);

            if ($row["website_type"]) {
                if (sizeof($urls) == sizeof($types)) {
                    foreach ($urls as $key => $url) {

                        $website_type = Type::ofWebsite()->where("name", $types[$key])->first();
                        $customer->websites()->save(new Website([
                            'url' => $urls[$key],
                            'type_id' => $website_type->id,
                        ]));
                    }
                }
            }

            $types = explode(";", $row["phone_type"]);
            $exts = explode(";", $row["ext"]);
            $phones = explode(";", $row["phone"]);

            if ($row["phone_type"]) {
                if (sizeof($phones) == sizeof($types)) {
                    foreach ($phones as $key => $phone) {
                        $phone_types = Type::ofPhone()->where("name", $types[$key])->first();
                        if(array_key_exists($key, $exts)){
                            $customer->phones()->save(new Phone([
                                'number' => $phone,
                                'ext' => $exts[$key],
                                'type_id' => $phone_types->id,
                            ]));
                        }else{
                            $customer->phones()->save(new Phone([
                                'number' => $phone,
                                'type_id' => $phone_types->id,
                            ]));
                        }
                    }
                }
            }

            $types = explode(";", $row["fax_type"]);
            $faxes = explode(";", $row["fax"]);

            if ($row["fax_type"]) {
                if (sizeof($faxes) == sizeof($types)) {

                    foreach ($faxes as $key => $fax) {
                        $fax_type = Type::ofFax()->where("name", $types[$key])->first();
                        $customer->faxes()->save(new Fax([
                            'number' => $fax,
                            'type_id' => $fax_type->id,
                        ]));
                    }
                }
            }

            $types = explode(";", $row["email_type"]);
            $emails = explode(";", $row["email"]);

            if ($row["email_type"]) {
                if (sizeof($emails) == sizeof($types)) {
                    foreach ($emails as $key => $email) {
                        $email_type = Type::ofEmail()->where("name", $types[$key])->first();
                        $customer->emails()->save(new Email([
                            'address' => $email,
                            'type_id' =>  $email_type->id,
                        ]));
                    }
                }
            }

            if ($row["address"]) {
                $addresses = explode(";", $row["address"]);
                $address_type = Type::where('of', 'address')->where('name', 'Company')->first();
                foreach ($addresses as $address) {
                    $customer->addresses()->save(new Address([
                        'address' => $address,
                        'type_id' => $address_type->id
                    ]));
                }
            }
        }
    }
}
