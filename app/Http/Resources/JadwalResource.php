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
            'waktu' => $this->waktu_1 . ' - ' . $this->waktu_2,
            'kuota' => $this->kuota,
            'tersisa' => $this->tersisa,
            'waktu_1' => $this->waktu_1,
            'waktu_2' => $this->waktu_2,
            'tanggal_edit' => Carbon::createFromDate($this->tanggal)->format('Y/m/d'),
        ];
    }
}
