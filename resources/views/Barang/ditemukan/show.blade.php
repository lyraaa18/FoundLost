@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Detail Barang Ditemukan</h4>
                    <span class="badge bg-success">Ditemukan</span>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            @if($laporanBarang->gambar_barang)
                                <img src="{{ asset('storage/' . $laporanBarang->gambar_barang) }}" class="img-fluid rounded" alt="Barang Ditemukan">
                            @else
                                <div class="bg-light d-flex justify-content-center align-items-center rounded" style="height: 250px;">
                                    <span class="text-muted">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-7">
                            <h5>Informasi Barang</h5>
                            <hr>
                            <p>
                                <strong>Lokasi Ditemukan:</strong> {{ $laporanBarang->lokasi_ditemukan }}<br>
                                <strong>Tanggal Ditemukan:</strong> {{ \Carbon\Carbon::parse($laporanBarang->tanggal_ditemukan)->format('d-m-Y') }}<br>
                                <strong>Lokasi Pengambilan:</strong> {{ $laporanBarang->lokasi_pengambilan ?? '-' }}<br>


                            </p>
                            <div class="mt-3">
                                <strong>Keterangan:</strong>
                                <p>{{ $laporanBarang->keterangan ?? 'Tidak ada keterangan' }}</p>
                            </div>
                            
                            <!-- <div class="alert alert-info mt-4">
                                <p class="mb-0">Jika Anda merasa ini adalah barang Anda, silakan hubungi admin di lokasi berikut:</p>
                                <p class="mb-0"><strong>Nama Admin:</strong> John Doe</p>
                                <p class="mb-0"><strong>Kontak Admin:</strong> 0812-3456-7890</p>
                                <p class="mb-0"><strong>Lokasi:</strong> Kantor Dinas Kehilangan Barang, Jalan Merdeka No. 123</p>
                            </div> -->
                            
                        </div>
                    </div>
                    
                    <div class="mt-4 text-end">
                        <a href="{{ route('barang.ditemukan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection