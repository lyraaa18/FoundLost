@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center py-3">
                    <h4 class="mb-0 fw-bold">
                        <i class="fas fa-clipboard-list me-2"></i>Detail Barang Hilang
                    </h4>
                    <span class="badge bg-danger px-3 py-2 rounded-pill">
                        <i class="fas fa-check-circle me-1"></i>
                        Hilang    
                    </span>
                </div>

                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-lg-5">
                            <div class="position-relative">
                                @if($barangHilang->gambar_barang)
                                    <img src="{{ asset('storage/' . $barangHilang->gambar_barang) }}" 
                                        class="img-fluid rounded shadow-sm" alt="{{ $barangHilang->nama_barang }}">
                                @else
                                    <div class="bg-light d-flex justify-content-center align-items-center rounded shadow-sm" 
                                        style="height: 300px;">
                                        <i class="fas fa-image fa-4x text-muted"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                    
                        <div class="col-lg-7">
                            <h3 class="mb-3 fw-bold text-primary">{{ $barangHilang->nama_barang }}</h3>
                            <hr class="my-3">
                            
                            <div class="d-flex flex-column gap-3 mb-4">
                                <!-- <div class="d-flex align-items-center">
                                    <div class="me-3 bg-light rounded-circle p-2">
                                        <i class="fas fa-user text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted">Nama Pemilik</small>
                                        <div class="fw-medium">{{ $barangHilang->nama_pemilik ?? 'Tidak disebutkan' }}</div>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-center">
                                    <div class="me-3 bg-light rounded-circle p-2">
                                        <i class="fas fa-phone text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted">Kontak</small>
                                        <div class="fw-medium">{{ $barangHilang->contact ?? 'Tidak disebutkan' }}</div>
                                    </div>
                                </div> -->
                                
                                
                                <div class="d-flex align-items-center">
                                    <div class="me-3 bg-light rounded-circle p-2">
                                        <i class="fas fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted">Lokasi Hilang</small>
                                        <div class="fw-medium">{{ $barangHilang->lokasi_hilang }}</div>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-center">
                                    <div class="me-3 bg-light rounded-circle p-2">
                                        <i class="fas fa-map-signs text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted">Lokasi Pengambilan</small>
                                        <div class="fw-medium">{{ $laporanBarang->lokasi_pengambilan ?? '-' }}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex align-items-center">
                                <div class="me-3 bg-light rounded-circle p-2">
                                    <i class="fas fa-calendar-alt text-primary"></i>
                                </div>
                                <div>
                                    <small class="text-muted">Tanggal Hilang</small>
                                    <div class="fw-medium">{{ \Carbon\Carbon::parse($barangHilang->tanggal_hilang)->format('d-m-Y') }}</div>
                                </div>
                            </div>
                            
                            <div class="card bg-light border-0 p-3 mb-4">
                                <h6 class="fw-bold mb-2"><i class="fas fa-align-left me-2"></i>Deskripsi:</h6>
                                <p class="mb-0">{{ $barangHilang->deskripsi ?? 'Tidak ada deskripsi' }}</p>
                            </div>
                            
                            <!-- @if($barangHilang->status == 'hilang')
                                <div class="mb-4">
                                    <a href="{{ route('barang.ditemukan.create') }}" class="btn btn-success w-100 py-2">
                                        <i class="fas fa-hand-holding me-2"></i>Saya Menemukan Barang Ini
                                    </a>
                                </div>
                            @endif -->
                        </div>
                    </div>
                    
                    <div class="mt-4 text-end">
                        <a href="{{ route('barang.hilang.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-gradient-primary {
        background: linear-gradient(to right, #4e73df, #224abe);
    }
    
    .rounded-circle {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endsection