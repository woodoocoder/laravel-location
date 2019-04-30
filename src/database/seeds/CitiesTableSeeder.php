<?php

namespace Woodoocoder\LaravelLocation\Database\Seeds;

use Illuminate\Database\Seeder;

use Woodoocoder\LaravelLocation\Model\Country;
use Woodoocoder\LaravelLocation\Model\Region;
use Woodoocoder\LaravelLocation\Model\City;

class CitiesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $file = fopen(__DIR__ . '/../../../data/cities.csv', 'r');
        
        while (($line = fgetcsv($file)) !== FALSE) {
            if($line[0] != 'city') {
                $ccode = $line[5];
                $region = str_replace("’", "'", $line[7]);

                $country = Country::where('short_code', strtoupper(trim($ccode)))->first();

                if($country) {

                    $reg = Region::where('country_id', $country->id)
                            ->where('en_name', 'LIKE', $region)->first();
                    
                    $data = [
                        'country_id' => $country->id,
                        'region_id' => ($reg)? $reg['id'] :null,
                        'en_name' => $line[1],
                        'latitude' => $line[2],
                        'longitude' => $line[3],
                        'approved' => true,
                    ];

                    City::create($data);
                }
            }
        }
        fclose($file);
    }
}
