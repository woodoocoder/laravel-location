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

    
    /**
     * @OA\Get(
     *     path="/api/location/countries",
     *     tags={"Location"},
     *     @OA\Parameter(
     *         name="q",
     *         in="query",
     *         description="Search string",
     *         @OA\Schema(
     *           type="string",
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Countries List",
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *     )
     * )
     */
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

    
    /**
     * @OA\Get(
     *     path="/api/location/regions",
     *     tags={"Location"},
     *     @OA\Parameter(
     *         name="q",
     *         in="query",
     *         description="Search string",
     *         @OA\Schema(
     *           type="string",
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Regions List",
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *     )
     * )
     */
    public function regions(Request $request, int $countryId=null) {
        $q = $request->get('q');
        $model = Region::query();
        
        if(!empty($q)) {
            $model->where('name', 'LIKE', '%'.$q.'%');
            $model->orWhere('en_name', 'LIKE', '%'.$q.'%');
        }

        if($countryId) {
            $model->where('country_id', $countryId);
        }

        $model->orderBy('id', 'asc');
        $items = $model->paginate(20)->appends($request->query());

        return RegionResource::collection($items);
    }

    
    /**
     * @OA\Get(
     *     path="/api/location/cities",
     *     tags={"Location"},
     *     @OA\Parameter(
     *         name="q",
     *         in="query",
     *         description="Search string",
     *         @OA\Schema(
     *           type="string",
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Cities List",
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *     )
     * )
     */
    public function cities(Request $request, int $countryId=null, int $regionId=null) {
        $q = $request->get('q');
        $model = City::query();

        if(!empty($q)) {
            $model->where('name', 'LIKE', '%'.$q.'%');
            $model->orWhere('en_name', 'LIKE', '%'.$q.'%');
        }

        if($countryId) {
            $model->where('country_id', $countryId);
        }

        if($regionId) {
            $model->where('region_id', $regionId);
        }


        $model->orderBy('id', 'asc');
        $items = $model->paginate(20)->appends($request->query());

        return CityResource::collection($items);
    }
    
}
