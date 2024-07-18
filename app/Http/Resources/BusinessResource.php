<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'speciality'=>$this->speciality,
            'history'=>$this->history,
            'email'=>$this->email,
            'address'=>$this->address,
            'logo'=>$this->logo,

            'zipCode'=>$this->zipCode->value,
            'city'=>$this->city->name,
            'theme'=>$this->theme->id,
        ];
    }
}
