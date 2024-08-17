<?php

namespace App\Http\Resources;

use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
//    public static $wrap = 'users';  to replace "data" by "users"

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'firstname'=>$this->firstname,
            'lastname'=>$this->lastname,
            'email'=>$this->email,
            'address'=>$this->address,
            'role'=>$this->role,
            'zipCode'=>$this->zipCode,
            'city'=>$this->city,
        ];
    }
}
