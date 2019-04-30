<?php

namespace Woodoocoder\LaravelLocation\Resource;


use Illuminate\Http\Resources\Json\JsonResource;


class CountryResource extends JsonResource {
    
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
            //'code' => $this->code,
            //'short_code' => $this->short_code,
            //'phone_code' => $this->phone_code
        ];
    }
}