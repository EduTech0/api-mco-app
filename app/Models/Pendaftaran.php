<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class Pendaftaran extends Model
{
    use HasFactory, HasApiTokens;

    protected $guarded = [
        'id'
    ];

    protected static function booted()
    {
        static::creating(function ($pendaftaran) {
            $pendaftaran->slug = $pendaftaran->slug ?: Str::uuid()->toString();
            $pendaftaran->status_pendaftaran = $pendaftaran->status_pendaftaran ?: 0;
            $pendaftaran->status_pembayaran = $pendaftaran->status_pembayaran ?: 0;
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


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
    public function pembayaran()
    {
        return $this->belongsToMany(Pembayaran::class, "pembayaran_pendaftaran", "pendaftaran_id", "pembayaran_id");
    }
}
