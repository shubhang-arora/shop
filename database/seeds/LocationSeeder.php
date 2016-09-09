<?php

use App\City;
use App\State;
use App\Zipcode;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states = [
            'Rajasthan' => [
                'Kota' => [
                    "326520"
                    , "326518"
                    , "325204"
                    , "325602"
                    , "325001"
                    , "325001"],
                'Ajmer' => ["305002", "305801", "305003", "305005", "305404", "305001"]
            ],
            'Uttar Pradesh' => [
                'Allahabad' => ["212303", "211007", "211003", "212208", "212208", "212217", "211004"]
            ],
        ];
        $i = 0;
        foreach ($states as $state => $cities) {

            $state_id = State::create([
                'state_name' => $state,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ])->id;

            foreach ($cities as $city => $zipcodes) {
                $city_id = City::create([
                    'state_id' => $state_id,
                    'city_name' => $city,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ])->id;
                foreach ($zipcodes as $zipcode) {
                    Zipcode::create([
                        'city_id' => $city_id,
                        'code' => $zipcode,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now()
                    ]);
                }
            }
        }
    }
}
