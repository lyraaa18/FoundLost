@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center py-3">
                    <h4 class="mb-0 fw-bold">
                        <i class="fas fa-clipboard-list me-2"></i>Detail Barang Ditemukan
                    </h4>
                    <span class="badge bg-success px-3 py-2 rounded-pill">
                        <i class="fas fa-check-circle me-1"></i>Ditemukan
                    </span>
                </div>

                <div class="card-body p-4">
                    <div class="row g-4">
                        <div class="col-lg-5">
                            <div class="position-relative">
                                @if($laporanBarang->gambar_barang)
                                    <img src="{{ asset('storage/' . $laporanBarang->gambar_barang) }}" 
                                        class="img-fluid rounded shadow-sm" alt="Barang Ditemukan">
                                @else
                                    <div class="bg-light d-flex justify-content-center align-items-center rounded shadow-sm" 
                                        style="height: 300px;">
                                        <i class="fas fa-image fa-4x text-muted"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-lg-7">
                            <h5 class="fw-bold text-primary mb-3">
                                <i class="fas fa-info-circle me-2"></i>Informasi Barang
                            </h5>
                            <hr class="my-3">
                            
                            <div class="d-flex flex-column gap-3 mb-4">
                                <div class="d-flex align-items-center">
                                    <div class="me-3 bg-light rounded-circle p-2">
                                        <i class="fas fa-map-marker-alt text-primary"></i>
                                    </div>
                                    <div>
                                        <small class="text-muted">Lokasi Ditemukan</small>
                                        <div class="fw-medium">{{ $laporanBarang->lokasi_ditemukan }}</div>
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
                                    <small class="text-muted">Tanggal Ditemukan</small>
                                    <div class="fw-medium">{{ \Carbon\Carbon::parse($laporanBarang->tanggal_ditemukan)->format('d-m-Y') }}</div>
                                </div>
                            </div>
                            
                            <div class="card bg-light border-0 p-3 mb-4">
                                <h6 class="fw-bold mb-2"><i class="fas fa-align-left me-2"></i>Keterangan:</h6>
                                <p class="mb-0">{{ $laporanBarang->keterangan ?? 'Tidak ada keterangan' }}</p>
                            </div>
                            
                            <!-- Commented out as per original code
                            <div class="alert alert-info mt-4 border-0 shadow-sm">
                                <h6 class="fw-bold"><i class="fas fa-bullhorn me-2"></i>Perhatian</h6>
                                <p class="mb-2">Jika Anda merasa ini adalah barang Anda, silakan hubungi admin di lokasi berikut:</p>
                                <div class="d-flex align-items-center mb-1">
                                    <i class="fas fa-user me-2 text-primary"></i>
                                    <span><strong>Nama Admin:</strong> John Doe</span>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <i class="fas fa-phone me-2 text-primary"></i>
                                    <span><strong>Kontak Admin:</strong> 0812-3456-7890</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                                    <span><strong>Lokasi:</strong> Kantor Dinas Kehilangan Barang, Jalan Merdeka No. 123</span>
                                </div>
                            </div>
                            -->
                        </div>
                    </div>
                    
                    <div class="mt-4 text-end">
                        <a href="{{ route('barang.ditemukan.index') }}" class="btn btn-secondary">
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