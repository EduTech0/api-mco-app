<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PembayaranResource extends JsonResource
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
            'name' => $this->first_name,
            'address' => $this->address,
            'phone' => $this->phone,
            'total' => $this->total,
            'status' => $this->status,
            'snapToken' => $this->snapToken
        ];
    }
}
