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
            'stock'=>$this->stock,
            'active'=>$this->active,
            'description'=>$this->description,
            'artisan'=>$this->artisan->firstname.' '.$this->artisan->lastname,
            'category'=> $this->category->name,
            'color'=>$this->color->name,
            'material'=>$this->material->name,
            'style'=>$this->style->name,
            'size'=>$this->size,
        ];
    }
}
