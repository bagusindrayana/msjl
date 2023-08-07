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
        Schema::create('surat_inaportnets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->string('nomor_surat',30)->unique();
            $table->string('klasifikasi_surat',20);
            $table->string('perihal_surat',100);
            $table->date('tanggal_surat');
            $table->string('kepada',150);

            
            $table->string('nama_kapal',100);
            $table->string('gt',20);
            $table->string('loa',20);
            $table->string('bendera',50);
            $table->string('agent',100);
            $table->string('pelabuhan_asal',100);
            $table->string('pelabuhan_tujuan',100);
            $table->string('muatan',100);
            $table->date('tanggal');
            $table->string('no_siup_pbm',50);

            $table->string('jasa_kapal',100)->nullable();
            $table->string('jasa_barang',100)->nullable();
            $table->string('jasa_labuh',100)->nullable();
            $table->string('jasa_pbm',100)->nullable();

            $table->string('file_lampiran',150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_inaportnets');
    }
};
