<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CederaResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'harga' => $this->harga,
            'image' => $this->image
        ];
    }
}
