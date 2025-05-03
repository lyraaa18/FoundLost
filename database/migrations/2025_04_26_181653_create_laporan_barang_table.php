<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelapor');
            $table->string('kontak_pelapor');
            $table->string('lokasi_ditemukan');
            $table->date('tanggal_ditemukan');
            $table->text('keterangan')->nullable();
            $table->string('gambar_barang')->nullable();
            $table->enum('status', ['pending', 'terverifikasi', 'selesai'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_barang');
    }
}
