<?php

namespace Woodoocoder\LaravelLocation\Resource\Short;


use Illuminate\Http\Resources\Json\JsonResource;


class RegionResource extends JsonResource {

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request) {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'en_name' => $this->en_name,
        ];
    }
}