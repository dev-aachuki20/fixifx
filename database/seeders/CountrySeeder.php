<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Webpatser\Countries\Countries;

class CountrySeeder extends Seeder
{
    public function run()
    {
        DB::table('countries')->delete();

        //Get all of the countries
        $countries = (new Countries())->getList();
        
        foreach ($countries as $countryId => $country){
            DB::table('countries')->insert(array(
                'id' => $countryId,                
                'name' => $country['name'],
                'currency_code' => ((isset($country['currency_code'])) ? $country['currency_code'] : null),
                'flag' =>((isset($country['flag'])) ? $country['flag'] : null),
            ));
        }
    
    }
}
