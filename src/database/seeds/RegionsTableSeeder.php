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
            Region::create([
                'id' => $region['id'],
                'country_id' => $region['country_id'],
                'name' => $region['name'],
                'en_name' => $region['en_name'],
                'approved' => true
            ]);
        }
    }
}
