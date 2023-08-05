<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_invoice',20)->unique();
            $table->unsignedBigInteger('customer_id')->index();
            $table->date('tanggal_invoice');
            $table->date('jumlah_invoice');
            $table->unsignedBigInteger('user_id')->index();
            $table->text('keterangan_invoice')->nullable();
            $table->string('file_invoice')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};