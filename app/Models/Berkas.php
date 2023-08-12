<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berkas extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nomor_berkas',
        'asal_berkas',
        'perihal',
        'tanggal_masuk',
        'keterangan',
        'file_berkas'
    ];
}
