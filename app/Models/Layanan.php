<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'gambar_layanan',
        'nama_layanan',
        'deskripsi_layanan'
    ];
}
