<?php

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = [
            'Albania Lek','Afghanistan Afghani','Argentina Peso','Aruba Guilder','Australia Dollar','Azerbaijan Manat','Bahamas Dollar','Barbados Dollar','Belarus Ruble','Belize Dollar','Bermuda Dollar','Bolivia Bolíviano','Bosnia and Herzegovina Convertible Mark','Botswana Pula','Bulgaria Lev','Brazil Real','Brunei Darussalam Dollar','Cambodia Riel','Canada Dollar','Cayman Islands Dollar','Chile Peso','China Yuan Renminbi','Colombia Peso','Costa Rica Colon','Croatia Kuna','Cuba Peso','Czech Republic Koruna','Denmark Krone','Dominican Republic Peso','East Caribbean Dollar','Egypt Pound','El Salvador Colon','Euro Member Countries','Falkland Islands (Malvinas) Pound','Fiji Dollar','Ghana Cedi','Gibraltar Pound','Guatemala Quetzal','Guernsey Pound','Guyana Dollar','Honduras Lempira','Hong Kong Dollar','Hungary Forint','Iceland Krona','India Rupee','Indonesia Rupiah','Iran Rial','Isle of Man Pound','Israel Shekel','Jamaica Dollar','Japan Yen','Jersey Pound','Kazakhstan Tenge','Korea (North) Won','Korea (South) Won','Kyrgyzstan Som','Laos Kip','Lebanon Pound','Liberia Dollar','Macedonia Denar','Malaysia Ringgit','Mauritius Rupee','Mexico Peso','Mongolia Tughrik','Mozambique Metical','Namibia Dollar','Nepal Rupee','Netherlands Antilles Guilder','New Zealand Dollar','Nicaragua Cordoba','Nigeria Naira','Norway Krone','Oman Rial','Pakistan Rupee','Panama Balboa','Paraguay Guarani','Peru Sol','Philippines Peso','Poland Zloty','Qatar Riyal','Romania Leu','Russia Ruble','Saint Helena Pound','Saudi Arabia Riyal','Serbia Dinar','Seychelles Rupee','Singapore Dollar','Solomon Islands Dollar','Somalia Shilling','South Africa Rand','Sri Lanka Rupee','Sweden Krona','Switzerland Franc','Suriname Dollar','Syria Pound','Taiwan New Dollar','Thailand Baht','Trinidad and Tobago Dollar','Turkey Lira','Tuvalu Dollar','Ukraine Hryvnia','United Kingdom Pound','United States Dollar','Uruguay Peso','Uzbekistan Som','Venezuela Bolívar','Viet Nam Dong','Yemen Rial','Zimbabwe Dollar'
            ];
        $code = [
            'ALL','AFN','ARS','AWG','AUD','AZN','BSD','BBD','BYN','BZD','BMD','BOB','BAM','BWP','BGN','BRL','BND','KHR','CAD','KYD','CLP','CNY','COP','CRC','HRK','CUP','CZK','DKK','DOP','XCD','EGP','SVC','EUR','FKP','FJD','GHS','GIP','GTQ','GGP','GYD','HNL','HKD','HUF','ISK','INR','IDR','IRR','IMP','ILS','JMD','JPY','JEP','KZT','KPW','KRW','KGS','LAK','LBP','LRD','MKD','MYR','MUR','MXN','MNT','MZN','NAD','NPR','ANG','NZD','NIO','NGN','NOK','OMR','PKR','PAB','PYG','PEN','PHP','PLN','QAR','RON','RUB','SHP','SAR','RSD','SCR','SGD','SBD','SOS','ZAR','LKR','SEK','CHF','SRD','SYP','TWD','THB','TTD','TRY','TVD','UAH','GBP','USD','UYU','UZS','VEF','VND','YER','ZWD'
            ];

        $symbol = [
            'Lek','؋','$','ƒ','$','₼','$','$','Br','BZ$','$','$b','KM','P','лв','R$','$','៛','$','$','$','¥','$','₡','kn','₱','Kč','kr','RD$','$','£','$','€','£','$','¢','£','Q','£','$','L','$','Ft','kr','₹','Rp','﷼','£','₪','J$','¥','£','лв','₩','₩','лв','₭','£','$','ден','RM','₨','$','₮','MT','$','₨','ƒ','$','C$','₦','kr','﷼','₨','B/.','Gs','S/.','₱','zł','﷼','lei','₽','£','﷼','Дин.','₨','$','$','S','R','₨','kr','CHF','$','£','NT$','฿','TT$','₺','$','₴','£','$','$U','лв','Bs','₫','﷼','Z$'
        ];

        for($index=0; $index < sizeof($name) ; $index++){
            Currency::create([
                'code'   => $name[$index],
                'name'   => $code[$index],
                'symbol' => $symbol[$index],
            ]);
        }
        
        // Currency::create([
        //     'code'   => 'idr',
        //     'name'   => 'Rupiah',
        //     'symbol' => 'Rp',
        // ]);

        // Currency::create([
        //     'code'   => 'usd',
        //     'name'   => 'US Dollar',
        //     'symbol' => '$',
        // ]);
    }
}
