<?php

namespace Woodoocoder\LaravelLocation\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

use Woodoocoder\LaravelLocation\Resource\Short\CountryResource;
use Woodoocoder\LaravelLocation\Resource\Short\RegionResource;

class CityResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        return [
            'id' => $this->id,
            'country' => new CountryResource($this->country),
            'region' => new RegionResource($this->region),
            'name' => $this->name,
            'en_name' => $this->en_name,
        ];
    }
}