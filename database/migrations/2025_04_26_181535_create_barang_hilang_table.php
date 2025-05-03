<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangHilangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_hilang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('nama_pemilik')->nullable();
            $table->string('contact')->nullable();
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_hilang');
            $table->string('lokasi_hilang');
            $table->enum('status', ['hilang','menunggu','ditemukan'])->default('hilang');
            $table->string('gambar_barang')->nullable();
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
        Schema::dropIfExists('barang_hilang');
    }
}
