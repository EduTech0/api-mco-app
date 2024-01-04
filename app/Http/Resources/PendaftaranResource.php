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
        if ($this->cederas) {
            foreach ($this->cederas as $cedera) {
                $tarif += $cedera->harga;
            }
        }
        $formattedTarif = number_format($tarif, 0, ',', '.');

        return [
            'id' => $this->id,
            'slug' => $this->slug,
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
            'status' => $this->status_pendaftaran == 0 ? 'Dalam Antrian' : ($this->status_pendaftaran == 1 ? 'Terverifikasi' : 'Selesai'),
            'status_pembayaran' => $this->status_pembayaran == 0 ? 'Belum Dibayar' : 'Sudah Dibayar',
            'tarif' => 'Rp ' . $formattedTarif,
            'total' => $tarif,
            'cederas' => $this->cederas ? $this->cederas->map(function ($item) {
                return new CederaResource($item);
            })->all() : 'null',
            'jadwal' => $this->jadwal ? $this->jadwal->map(function ($item) {
                return new JadwalResource($item);
            })->all() : 'null',
            'pembayaran' => $this->pembayaran ? new PembayaranResource($this->pembayaran->first()) : 'null',
        ];
    }
}
