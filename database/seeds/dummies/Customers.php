<?php

use App\Models\Customer;
use Illuminate\Database\Seeder;

class Customers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = ['lv1','lv2','lv3','lv4','lv5'];
        foreach($levels as $level){
        $faker = \Faker\Factory::create();

            $attentions = [];
            $level = Level::where('code',$level)->first();
            for ($j = 1; $j <= rand(2, 3) ; $j++) {

                $temp_email = $temp_number = [];
                for ($j = 1; $j <= rand(2, 5) ; $j++) {
                    array_push($temp_number, $faker->e164PhoneNumber);
                }
                for ($j = 1; $j <= rand(2, 5) ; $j++) {
                    array_push($temp_email, $faker->companyEmail);
                }

                $contact['name']     = $faker->name;
                $contact['position'] = $faker->jobTitle;
                $contact['phones'] = $temp_number;
                $contact['fax'] = $faker->e164PhoneNumber;
                $contact['ext'] = $faker->e164PhoneNumber;
                $contact['emails'] = $temp_email;

                array_push($attentions, $contact);
            }

            $customer = Customer::create([
                'name' => $faker->company,
                'code' => "auto-generate",
                'attention' => json_encode($attentions),
                'payment_term' => $faker->randomDigitNotNull,
            ]);

            if ($customer) {
                $customer->levels()->attach($level);

                $website_type = Type::ofWebsite()->get();
                for ($j = 1; $j <= rand(2, 3) ; $j++) {
                    $customer->websites()->save(new Website([
                        'url' => $faker->url,
                        'type_id' => $website_type[$faker->numberBetween($min = 0, $max = sizeof($website_type) - 1 )]->id,
                        ]));
                    }

                $phone_types = Type::ofPhone()->get();
                for ($j = 1; $j <= rand(2, 3) ; $j++) {
                    $customer->phones()->save(new Phone([
                        'number' => $faker->phoneNumber,
                        'ext' => $faker->buildingNumber,
                        'type_id' => $phone_types[$faker->numberBetween($min = 0, $max = sizeof($phone_types) - 1 )]->id,
                    ]));
                }

                $fax_type = Type::ofFax()->get();
                for ($j = 1; $j <= rand(2, 3) ; $j++) {
                    $customer->faxes()->save(new Fax([
                        'number' => $faker->phoneNumber,
                        'type_id' => $fax_type[$faker->numberBetween($min = 0, $max = sizeof($fax_type) - 1 )]->id,
                    ]));
                }

                $email_type = Type::ofEmail()->get();
                for ($j = 1; $j <= rand(2, 3) ; $j++) {
                    $customer->emails()->save(new Email([
                        'address' => $faker->email,
                        'type_id' =>  $email_type[$faker->numberBetween($min = 0, $max = sizeof($email_type) - 1 )]->id,
                    ]));
                }

                $address_type = Type::where('of','address')->where('name','Company')->first();
                for ($j = 1; $j <= rand(2, 5) ; $j++) {
                    $customer->addresses()->save(new Address([
                        'address' => $faker->address,
                        'type_id' => $address_type->id
                    ]));
                }

            }
        }

        factory(Customer::class, config('memfis.dummies.customers'))->create();
    }
}
