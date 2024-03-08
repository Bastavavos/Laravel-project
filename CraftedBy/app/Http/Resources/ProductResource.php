<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'image'=>$this->image,
            'price'=>$this->price,

            'stock'=>$this->stock,  // if select one product
            'active'=>$this->active,
            'description'=>$this->description,

            'color'=>$this->color,  // call methods Product model
            'material'=>$this->material,
            'style'=>$this->style,
            'size'=>$this->size,
            'category'=>$this->category,
            'business'=>$this->business,
        ];
    }
}
