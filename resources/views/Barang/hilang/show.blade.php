@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Detail Barang Hilang</h4>
                    <span class="badge bg-{{ $barangHilang->status == 'hilang' ? 'danger' : ($barangHilang->status == 'menunggu' ? 'warning' : 'success') }}">
                        {{ ucfirst($barangHilang->status) }}
                    </span>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            @if($barangHilang->gambar_barang)
                                <img src="{{ asset('storage/' . $barangHilang->gambar_barang) }}" class="img-fluid rounded" alt="{{ $barangHilang->nama_barang }}">
                            @else
                                <div class="bg-light d-flex justify-content-center align-items-center rounded" style="height: 250px;">
                                    <span class="text-muted">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-7">
                            <h3>{{ $barangHilang->nama_barang }}</h3>
                            <hr>
                            <p>
                                <strong>Nama Pemilik:</strong> {{ $barangHilang->nama_pemilik ?? 'Tidak disebutkan' }}<br>
                                <strong>Kontak:</strong> {{ $barangHilang->contact ?? 'Tidak disebutkan' }}<br>
                                <strong>Tanggal Hilang:</strong> {{ \Carbon\Carbon::parse($barangHilang->tanggal_hilang)->format('d-m-Y') }}<br>
                                <strong>Lokasi Hilang:</strong> {{ $barangHilang->lokasi_hilang }}<br>
                                <strong>Lokasi Pengambilan:</strong> {{ $laporanBarang->lokasi_pengambilan ?? '-' }}<br>

                            </p>
                            <div class="mt-3">
                                <strong>Deskripsi:</strong>
                                <p>{{ $barangHilang->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                            </div>
                            
                            @if($barangHilang->status == 'hilang')
                                <div class="mt-4">
                                    <a href="{{ route('barang.ditemukan.create') }}" class="btn btn-success">
                                        Saya Menemukan Barang Ini
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mt-4 text-end">
                        <a href="{{ route('barang.hilang.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection