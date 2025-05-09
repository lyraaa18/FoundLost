<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BarangHilang extends Model
{
    use HasFactory, SoftDeletes; // Menambahkan trait SoftDeletes

    protected $table = 'barang_hilang';

    protected $fillable = [
        'nama_barang',
        'deskripsi',
        'tanggal_hilang',
        'lokasi_hilang',
        'status',
        'gambar_barang',
        'nama_pemilik',
        'contact', 
        'lokasi_pengambilan',
        'bukti_perjalanan',
    ];

}
