<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratInaportnet extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nomor_surat',
        'klasifikasi_surat',
        'perihal_surat',
        'tanggal_surat',
        'kepada',
        'nama_kapal',
        'gt',
        'loa',
        'bendera',
        'agent',
        'pelabuhan_asal',
        'pelabuhan_tujuan',
        'muatan',
        'tanggal',
        'no_siup_pbm',
        'jasa_kapal',
        'jasa_barang',
        'jasa_labuh',
        'jasa_pbm',
        'file_lampiran',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
