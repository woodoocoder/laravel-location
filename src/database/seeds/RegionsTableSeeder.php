<?php

namespace Woodoocoder\LaravelLocation\Database\Seeds;

use Illuminate\Database\Seeder;

use Woodoocoder\LaravelLocation\Model\Country;
use Woodoocoder\LaravelLocation\Model\Region;

class RegionsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $regions = json_decode(file_get_contents(__DIR__ . '/../../../data/regions.json'), true);


        foreach ($regions as $region) {
            $country = Country::where('short_code', strtoupper($region['ccode']))->first();

            if($country) {
                Region::create([
                    'country_id' => $country->id,
                    'en_name' => $region['name'],
                    'approved' => true
                ]);
            }
            else {
                //echo $region['country'].'----'.$region['name']."\n";
            }
        }
    }
}
