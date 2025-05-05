@extends('layouts.app')

@section('content')
<div class="container py-5">
    <!-- Hero Section -->
    <div class="row justify-content-center mb-5">
        <div class="col-md-10">
            <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-6 bg-primary p-5 text-white d-flex flex-column justify-content-center">
                            <h1 class="display-5 fw-bold mb-3">Sistem Barang Hilang & Ditemukan</h1>
                            <p class="lead mb-4">Platform yang membantu Anda menemukan barang yang hilang atau melaporkan barang yang Anda temukan dengan cepat dan mudah.</p>
                            <div class="d-flex gap-2">
                                <a href="#cara-kerja" class="btn btn-light text-primary fw-semibold">
                                    <i class="fas fa-info-circle me-2"></i>Cara Kerja
                                </a>
                                <a href="#statistik" class="btn btn-outline-light">
                                    <i class="fas fa-chart-bar me-2"></i>Statistik
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6 p-5 bg-light">
                            <div class="text-center mb-4">
                                <i class="fas fa-search fa-3x mb-3 text-primary"></i>
                                <h2 class="fw-bold">Apa yang ingin Anda lakukan?</h2>
                            </div>
                            <div class="d-grid gap-3">
                                <a href="{{ route('barang.hilang.create') }}" class="btn btn-danger btn-lg p-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="fas fa-exclamation-circle me-2"></i>
                                        <span class="fw-bold">Laporkan Barang Hilang</span>
                                    </div>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                                <a href="{{ route('barang.ditemukan.create') }}" class="btn btn-success btn-lg p-3 d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="fas fa-check-circle me-2"></i>
                                        <span class="fw-bold">Laporkan Barang Ditemukan</span>
                                    </div>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats Cards -->
    <div class="row justify-content-center mb-5" id="statistik">
        <div class="col-md-10">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 rounded-3 shadow-sm hover-shadow">
                        <div class="card-body p-4 text-center">
                            <div class="rounded-circle bg-primary bg-opacity-10 p-3 d-inline-flex mb-3">
                                <i class="fas fa-list fa-2x text-primary"></i>
                            </div>
                            <h2 class="display-5 fw-bold text-primary mb-0">{{ $totalLaporan ?? '0' }}</h2>
                            <p class="text-muted mb-0">Total Laporan</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 rounded-3 shadow-sm hover-shadow">
                        <div class="card-body p-4 text-center">
                            <div class="rounded-circle bg-danger bg-opacity-10 p-3 d-inline-flex mb-3">
                                <i class="fas fa-exclamation-circle fa-2x text-danger"></i>
                            </div>
                            <h2 class="display-5 fw-bold text-danger mb-0">{{ $totalHilang ?? '0' }}</h2>
                            <p class="text-muted mb-0">Barang Hilang</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 rounded-3 shadow-sm hover-shadow">
                        <div class="card-body p-4 text-center">
                            <div class="rounded-circle bg-success bg-opacity-10 p-3 d-inline-flex mb-3">
                                <i class="fas fa-check-circle fa-2x text-success"></i>
                            </div>
                            <h2 class="display-5 fw-bold text-success mb-0">{{ $totalDitemukan ?? '0' }}</h2>
                            <p class="text-muted mb-0">Barang Ditemukan</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- How It Works Section -->
    <div class="row justify-content-center mb-5" id="cara-kerja">
        <div class="col-md-10">
            <div class="card border-0 rounded-3 shadow-lg">
                <div class="card-header bg-primary p-4 border-0">
                    <h2 class="text-white mb-0">
                        <i class="fas fa-info-circle me-2"></i>Cara Kerja
                    </h2>
                </div>
                <div class="card-body p-5">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="step-card position-relative h-100">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                    <span class="fw-bold fs-3">1</span>
                                </div>
                                <h4 class="mb-3">Buat Laporan</h4>
                                <p class="text-muted mb-0">Laporkan barang yang hilang atau yang Anda temukan dengan detail lengkap. Sertakan foto jika memungkinkan.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="step-card position-relative h-100">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                    <span class="fw-bold fs-3">2</span>
                                </div>
                                <h4 class="mb-3">Cari & Verifikasi</h4>
                                <p class="text-muted mb-0">Sistem akan membantu mencocokkan barang hilang dengan yang ditemukan secara cepat dan efisien.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="step-card position-relative h-100">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                    <span class="fw-bold fs-3">3</span>
                                </div>
                                <h4 class="mb-3">Pengembalian</h4>
                                <p class="text-muted mb-0">Konfirmasi pengembalian barang dan selesaikan proses dengan aman dan terpercaya.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 rounded-3 shadow-lg overflow-hidden">
                <div class="card-body p-0">
                    <!-- <div class="row g-0"> -->
                        <div class="col-lg-12 bg-primary p-5 text-white">
                            <h2 class="mb-4">Tentang Kami</h2>
                            <p>Sistem Barang Hilang & Ditemukan adalah platform yang dibuat untuk membantu masyarakat dalam menemukan barang yang hilang atau melaporkan barang yang ditemukan.</p>
                            <p>Misi kami adalah menciptakan komunitas yang saling membantu dan peduli terhadap sesama. Dengan menggunakan platform ini, Anda turut berkontribusi dalam membangun budaya gotong royong dan kejujuran.</p>
                            <div class="mt-4">
                                <h5><i class="fas fa-envelope me-2"></i>Hubungi Kami</h5>
                                <p class="mb-0">Jika Anda memiliki pertanyaan atau saran, silakan hubungi kami melalui email: info@baranghilang.com</p>
                            </div>
                        </div>
                        <!-- <div class="col-lg-7 p-5">
                            <h3 class="mb-4">Pilihan Kategori Barang</h3>
                            <div class="row g-3">
                                <div class="col-6 col-md-4">
                                    <div class="category-item p-3 bg-light rounded text-center hover-shadow">
                                        <i class="fas fa-mobile-alt fa-2x text-primary mb-2"></i>
                                        <h6 class="mb-0">Elektronik</h6>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="category-item p-3 bg-light rounded text-center hover-shadow">
                                        <i class="fas fa-wallet fa-2x text-primary mb-2"></i>
                                        <h6 class="mb-0">Dompet</h6>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="category-item p-3 bg-light rounded text-center hover-shadow">
                                        <i class="fas fa-key fa-2x text-primary mb-2"></i>
                                        <h6 class="mb-0">Kunci</h6>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="category-item p-3 bg-light rounded text-center hover-shadow">
                                        <i class="fas fa-id-card fa-2x text-primary mb-2"></i>
                                        <h6 class="mb-0">Kartu Identitas</h6>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="category-item p-3 bg-light rounded text-center hover-shadow">
                                        <i class="fas fa-tshirt fa-2x text-primary mb-2"></i>
                                        <h6 class="mb-0">Pakaian</h6>
                                    </div>
                                </div>
                                <div class="col-6 col-md-4">
                                    <div class="category-item p-3 bg-light rounded text-center hover-shadow">
                                        <i class="fas fa-ellipsis-h fa-2x text-primary mb-2"></i>
                                        <h6 class="mb-0">Lainnya</h6>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-shadow {
        transition: all 0.3s ease;
    }
    
    .hover-shadow:hover {
        transform: translateY(-5px);
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
    
    .step-card {
        padding-left: 20px;
        border-left: 3px solid #f8f9fa;
        transition: all 0.3s ease;
    }
    
    .step-card:hover {
        border-left-color: var(--bs-primary);
    }
    
    .category-item {
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .category-item:hover {
        background-color: var(--bs-primary) !important;
        color: white;
    }
    
    .category-item:hover i {
        color: white !important;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});
</script>
@endsection