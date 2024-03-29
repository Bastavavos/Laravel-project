<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'customer'=> new UserResource($this->resource->customer),
            'status'=> $this->status->last()->name,
            'update_at'=>$this->status->last()->pivot->updated_at,
        ];
    }
}
