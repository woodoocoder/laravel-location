<?php

namespace Woodoocoder\LaravelLocation;

use Illuminate\Http\Request;

use Woodoocoder\LaravelLocation\Model\Country;
use Woodoocoder\LaravelLocation\Resource\CountryResource;

use Woodoocoder\LaravelLocation\Model\Region;
use Woodoocoder\LaravelLocation\Resource\RegionResource;

use Woodoocoder\LaravelLocation\Model\City;
use Woodoocoder\LaravelLocation\Resource\CityResource;


class LocationController extends Controller {

    public function countries(Request $request) {
        $q = $request->get('q');
        $model = Country::query();

        if(!empty($q)) {
            $model->where('name', 'LIKE', '%'.$q.'%');
            $model->orWhere('en_name', 'LIKE', '%'.$q.'%');
        }

        $model->orderBy('id', 'asc');
        $items = $model->paginate(20)->appends($request->query());

        return CountryResource::collection($items);
    }

    public function regions(Request $request) {
        $q = $request->get('q');
        $model = Region::query();

        if(!empty($q)) {
            $model->where('name', 'LIKE', '%'.$q.'%');
            $model->orWhere('en_name', 'LIKE', '%'.$q.'%');
        }

        $model->orderBy('id', 'asc');
        $items = $model->paginate(20)->appends($request->query());

        return RegionResource::collection($items);
    }

    public function cities(Request $request) {
        $q = $request->get('q');
        $model = City::query();

        if(!empty($q)) {
            $model->where('name', 'LIKE', '%'.$q.'%');
            $model->orWhere('en_name', 'LIKE', '%'.$q.'%');
        }

        $model->orderBy('id', 'asc');
        $items = $model->paginate(20)->appends($request->query());

        return CityResource::collection($items);
    }
    
    
}
