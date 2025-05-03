@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Daftar Barang Ditemukan</h4>
                    <a href="{{ route('barang.ditemukan.create') }}" class="btn btn-primary">Laporkan Barang Ditemukan</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <form action="{{ route('barang.ditemukan.index') }}" method="GET" class="form-inline">
                            <div class="input-group w-100">
                                <input type="text" class="form-control" name="search" placeholder="Cari barang ditemukan..." value="{{ $search ?? '' }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    @if($barangDitemukan->isEmpty())
                        <div class="text-center py-5">
                            <h5>Tidak ada barang ditemukan yang sesuai pencarian</h5>
                            <p>Tidak menemukan barang yang Anda cari?</p>
                            <a href="{{ route('barang.hilang.create') }}" class="btn btn-warning mt-3">Laporkan Kehilangan Barang</a>
                        </div>
                    @else
                        <div class="row">
                            @foreach($barangDitemukan as $barang)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        <div class="card-header">
                                            <span class="badge bg-success">Ditemukan</span>
                                        </div>
                                        
                                        @if($barang->gambar_barang)
                                            <img src="{{ asset('storage/' . $barang->gambar_barang) }}" class="card-img-top" alt="Barang Ditemukan" style="height: 200px; object-fit: cover;">
                                        @else
                                            <div class="card-img-top bg-light d-flex justify-content-center align-items-center" style="height: 200px;">
                                                <span class="text-muted">Tidak ada gambar</span>
                                            </div>
                                        @endif
                                        
                                        <div class="card-body">
                                            <p class="card-text">
                                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> {{ $barang->lokasi_ditemukan }}</small><br>
                                                <small class="text-muted"><i class="fas fa-map-signs"></i> Lokasi Pengambilan: {{ $barang->lokasi_pengambilan ?? '-' }}</small><br>
                                                <small class="text-muted"><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($barang->tanggal_ditemukan)->format('d-m-Y') }}</small>
                                            </p>
                                            <a href="{{ route('barang.ditemukan.show', $barang->id) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="d-flex justify-content-center mt-4">
                            {{ $barangDitemukan->appends(['search' => $search])->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection