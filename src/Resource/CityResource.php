<?php

namespace Woodoocoder\LaravelLocation\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

use Woodoocoder\LaravelLocation\Resource\Short\CountryResource;
use Woodoocoder\LaravelLocation\Resource\Short\RegionResource;

/**
 *   @OA\Schema(
 *   schema="City",
 *   type="object",
 *   allOf={
 *       @OA\Schema(
 *           @OA\Property(property="id", format="integer", type="integer"),
 *           @OA\Property(property="country", format="string", type="string"),
 *           @OA\Property(property="region", format="string", type="string")
 *       )
 *   }
 * )
 */
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