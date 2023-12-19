<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PendaftaranResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray($request)
    {
        $tarif = 0;
        if ($this->cedera) {
            foreach ($this->cedera as $cedera) {
                $tarif += $cedera->harga;
            }
        }
        $formattedTarif = number_format($tarif, 0, ',', '.');

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'nama_lengkap' => $this->nama_lengkap,
            'jenis_kelamin' => $this->jenis_kelamin,
            'berat' => $this->berat,
            'tinggi' => $this->tinggi,
            'usia' => $this->usia,
            'pekerjaan' => $this->pekerjaan,
            'alamat' => $this->alamat,
            'nomor' => $this->nomor,
            'olahraga' => $this->olahraga,
            'cabang' => $this->cabang,
            'penyebab' => $this->penyebab,
            'lama_cedera' => $this->lama_cedera,
            'jumlah_terapi' => $this->jumlah_terapi,
            'status' => $this->status == 0 ? 'Dalam Antrian' : ($this->status == 1 ? 'Terverifikasi' : 'Selesai'),
            'cederas' => $this->cedera ? $this->cedera : null,
            'tarif' => 'Rp ' . $formattedTarif
        ];
    }
}
