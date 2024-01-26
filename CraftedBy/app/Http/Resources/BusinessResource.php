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
            'name'=>$this->name,
            'description'=>$this->description,
            'history'=>$this->history,
            'email'=>$this->email,
            'address'=>$this->address,
            'logo'=>$this->logo,

            'zipCode'=>$this->zipCode, // call Business Model method
            'city'=>$this->city,
            'theme'=>$this->theme,
            'speciality'=>$this->speciality,
        ];
    }
}
