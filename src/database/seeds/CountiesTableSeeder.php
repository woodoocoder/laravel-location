<?php

namespace Woodoocoder\LaravelLocation\Database\Seeds;

use Illuminate\Database\Seeder;

use Woodoocoder\LaravelLocation\Model\Country;

class CountiesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $countries = json_decode(file_get_contents(__DIR__ . '/../../../data/countries.json'), true);

        foreach ($countries as $country) {
            Country::create([
                'en_name' => $country['name'],
                'code' => $country['code'],
                'short_code' => $country['shortCode'],
                'phone_code' => $country['phoneCode'],
                'approved' => true
            ]);
        }
    }
}
