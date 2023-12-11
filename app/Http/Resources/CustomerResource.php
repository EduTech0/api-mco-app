<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
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
            'email' => $this->email,
            'tanggal_lahir' => Carbon::createFromDate($this->tanggal_lahir)->format('d F Y'),
            'jenis_kelamin' => $this->jenis_kelamin,
            'role' => $this->role,
            'address' => $this->address,
            'tanggal_edit' => Carbon::createFromDate($this->tanggal_lahir)->format('Y/m/d'),
        ];
    }
}
