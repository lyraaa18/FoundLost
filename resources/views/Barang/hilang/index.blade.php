@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Daftar Barang Hilang</h4>
                    <a href="{{ route('barang.hilang.create') }}" class="btn btn-primary">Laporkan Barang Hilang</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mb-4">
                        <form action="{{ route('barang.hilang.index') }}" method="GET" class="form-inline">
                            <div class="input-group w-100">
                                <input type="text" class="form-control" name="search" placeholder="Cari barang hilang..." value="{{ $search ?? '' }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    @if($barangHilang->isEmpty())
                        <div class="text-center py-5">
                            <h5>Tidak ada barang hilang yang ditemukan</h5>
                            <p>Tidak menemukan barang yang Anda cari?</p>
                            <a href="{{ route('barang.ditemukan.index') }}" class="btn btn-info mt-3">Cek Barang Ditemukan</a>
                        </div>
                    @else
                        <div class="row">
                            @foreach($barangHilang as $barang)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        <div class="card-header">
                                            <span class="badge bg-{{ $barang->status == 'hilang' ? 'danger' : ($barang->status == 'menunggu' ? 'warning' : 'success') }}">
                                                {{ ucfirst($barang->status) }}
                                            </span>
                                        </div>
                                        
                                        @if($barang->gambar_barang)
                                            <img src="{{ asset('storage/' . $barang->gambar_barang) }}" class="card-img-top" alt="{{ $barang->nama_barang }}" style="height: 200px; object-fit: cover;">
                                        @else
                                            <div class="card-img-top bg-light d-flex justify-content-center align-items-center" style="height: 200px;">
                                                <span class="text-muted">Tidak ada gambar</span>
                                            </div>
                                        @endif
                                        
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $barang->nama_barang }}</h5>
                                            <p class="card-text">
                                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> {{ $barang->lokasi_hilang }}</small><br>
                                                <small class="text-muted"><i class="fas fa-map-signs"></i> Lokasi Pengambilan: {{ $barang->lokasi_pengambilan ?? '-' }}</small><br>
                                                <small class="text-muted"><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($barang->tanggal_hilang)->format('d-m-Y') }}</small>

                                            </p>
                                            <a href="{{ route('barang.hilang.show', $barang->id) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="d-flex justify-content-center mt-4">
                            {{ $barangHilang->appends(['search' => $search])->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection