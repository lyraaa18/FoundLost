<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class LaporanBarang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'laporan_barang';
    
    protected $fillable = [
        'nama_pelapor',
        'kontak_pelapor',
        'lokasi_ditemukan',
        'tanggal_ditemukan',
        'keterangan',
        'status',
        'gambar_barang',
        'lokasi_pengambilan',
        'bukti_barang',
        'bukti_perjalanan',
    ];

    protected $casts = [
        'tanggal_ditemukan' => 'date',
    ];

    /**
     * Get the barang that this report is related to.
     */
}