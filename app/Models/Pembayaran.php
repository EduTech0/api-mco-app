<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pendaftarans()
    {
        return $this->belongsToMany(Pendaftaran::class, "pembayaran_pendaftaran", "pembayaran_id", "pendaftaran_id");
    }
}
