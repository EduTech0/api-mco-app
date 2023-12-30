<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Pendaftaran extends Model
{
    use HasFactory, HasApiTokens;

    protected $guarded = [
        'id'
    ];
    protected $attributes = [
        'status' => 0,
        'status_pembayaran' => 0
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function cederas()
    {
        return $this->belongsToMany(Cedera::class, "keluhans", "pendaftaran_id", "cedera_id");
    }
    public function jadwal()
    {
        return $this->belongsToMany(Jadwal::class, "pendaftaran_jadwal", "pendaftaran_id", "jadwal_id");
    }
    public function midtrans()
    {
        return $this->belongsToMany(Midtrans::class, "midtrans", "pendaftaran_id");
    }
}
