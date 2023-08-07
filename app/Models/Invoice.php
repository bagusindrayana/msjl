<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'user_id',
        'nomor_invoice',
        'tanggal_invoice',
        'jumlah_invoice',
        'keterangan_invoice',
        'file_invoice'
    ];

    function customer() {
        return $this->belongsTo(Customer::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }

    function invoice_details() {
        return $this->hasMany(InvoiceDetail::class);
    }
}
