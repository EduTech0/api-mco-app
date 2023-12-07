<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Jadwal extends Model
{
    use HasFactory, HasApiTokens;

    protected $guarded = [
        'id'
    ];
}
