<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class JadwalResource extends JsonResource
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
            'tanggal' => Carbon::createFromDate($this->tanggal)->format('d F Y'),
            'tanggal_header' => Carbon::createFromDate($this->tanggal)->format('M d, Y'),
            'waktu' => $this->waktu1 . ' - ' . $this->waktu2,
            'kuota' => $this->kuota,
            'tersisa' => $this->tersisa
        ];
    }
}
