@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center py-3">
                    <h4 class="mb-0 fw-bold">
                        <i class="fas fa-search-location me-2"></i>Daftar Barang Ditemukan
                    </h4>
                    <a href="{{ route('barang.ditemukan.create') }}" class="btn btn-light">
                        <i class="fas fa-plus-circle me-2"></i>Laporkan Barang Ditemukan
                    </a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="mb-4">
                        <form action="{{ route('barang.ditemukan.index') }}" method="GET">
                            <div class="input-group">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="fas fa-search text-muted"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0" name="search" 
                                    placeholder="Cari barang ditemukan..." value="{{ $search ?? '' }}">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </form>
                    </div>

                    @if($barangDitemukan->isEmpty())
                        <div class="text-center py-5">
                            <div class="mb-4">
                                <i class="fas fa-search fa-4x text-muted"></i>
                            </div>
                            <h5 class="text-muted">Tidak ada barang ditemukan yang sesuai pencarian</h5>
                            <p class="text-muted">Tidak menemukan barang yang Anda cari?</p>
                            <a href="{{ route('barang.hilang.create') }}" class="btn btn-warning mt-3">
                                <i class="fas fa-exclamation-triangle me-2"></i>Laporkan Kehilangan Barang
                            </a>
                        </div>
                    @else
                        <div class="row g-4">
                            @foreach($barangDitemukan as $barang)
                                <div class="col-lg-4 col-md-6">
                                    <div class="card h-100 border-0 shadow-sm hover-card">
                                        <div class="position-relative">
                                            @if($barang->gambar_barang)
                                                <img src="{{ asset('storage/' . $barang->gambar_barang) }}" 
                                                    class="card-img-top rounded-top" alt="Barang Ditemukan" 
                                                    style="height: 220px; object-fit: cover;">
                                            @else
                                                <div class="card-img-top bg-light d-flex justify-content-center align-items-center rounded-top" 
                                                    style="height: 220px;">
                                                    <i class="fas fa-image fa-3x text-muted"></i>
                                                </div>
                                            @endif
                                            <div class="position-absolute top-0 start-0 m-3">
                                                <span class="badge bg-success px-3 py-2 rounded-pill">
                                                    <i class="fas fa-check-circle me-1"></i>Ditemukan
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="card-body">
                                        <h5 class="card-title fw-bold mb-3">{{ $barang->nama_barang }}</h5>
                                            <div class="d-flex flex-column gap-2 mb-3">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-map-marker-alt text-danger me-2"></i>
                                                    <span>{{ $barang->lokasi_ditemukan }}</span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-map-signs text-primary me-2"></i>
                                                    <span>Lokasi Pengambilan: {{ $barang->lokasi_pengambilan ?? '-' }}</span>
                                                </div>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-calendar-alt text-success me-2"></i>
                                                    <span>{{ \Carbon\Carbon::parse($barang->tanggal_ditemukan)->format('d-m-Y') }}</span>
                                                </div>
                                            </div>
                                            <a href="{{ route('barang.ditemukan.show', $barang->id) }}" 
                                                class="btn btn-primary w-100">
                                                <i class="fas fa-info-circle me-2"></i>Lihat Detail
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="d-flex justify-content-center mt-5">
                            {{ $barangDitemukan->appends(['search' => $search])->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(to right, #4e73df, #224abe);
    }
    
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .pagination {
        --bs-pagination-active-bg: #4e73df;
        --bs-pagination-active-border-color: #4e73df;
    }
</style>
@endsection