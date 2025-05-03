@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                    <div class="text-center mb-5">
                        <i class="fas fa-search fa-4x mb-3 text-primary"></i>
                        <h1 class="display-5 fw-bold">Sistem Barang Hilang & Ditemukan</h1>
                        <p class="lead">Platform yang membantu Anda menemukan barang yang hilang atau melaporkan barang yang Anda temukan.</p>
                    </div>

                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <i class="fas fa-exclamation-circle fa-3x text-danger mb-3"></i>
                                    <h3>Laporkan Barang Hilang</h3>
                                    <p>Kehilangan barang? Laporkan detail barang Anda yang hilang, dan kami akan membantu Anda menemukannya.</p>
                                    <a href="{{ route('barang.hilang.create') }}" class="btn btn-danger mt-2">
                                        <i class="fas fa-plus-circle me-2"></i>Laporkan Barang Hilang
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center p-4">
                                    <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                                    <h3>Laporkan Barang Ditemukan</h3>
                                    <p>Menemukan barang? Laporkan detail barang yang Anda temukan untuk membantu pemiliknya.</p>
                                    <a href="{{ route('barang.ditemukan.create') }}" class="btn btn-success mt-2">
                                        <i class="fas fa-plus-circle me-2"></i>Laporkan Barang Ditemukan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0 bg-light">
                        <div class="card-body p-4">
                            <h3 class="mb-4">Cara Kerja</h3>
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                            <i class="fas fa-file-alt fa-2x"></i>
                                        </div>
                                        <h5>1. Buat Laporan</h5>
                                        <p>Laporkan barang yang hilang atau yang Anda temukan dengan detail lengkap</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                            <i class="fas fa-search fa-2x"></i>
                                        </div>
                                        <h5>2. Cari & Verifikasi</h5>
                                        <p>Sistem akan membantu mencocokkan barang hilang dengan yang ditemukan</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                            <i class="fas fa-handshake fa-2x"></i>
                                        </div>
                                        <h5>3. Pengembalian</h5>
                                        <p>Konfirmasi pengembalian barang dan selesaikan proses</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h3 class="mb-4">Statistik Terkini</h3>
                    <div class="row text-center g-4">
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded">
                                <h4 class="text-primary"><i class="fas fa-list me-2"></i>{{ $totalLaporan ?? '0' }}</h4>
                                <p class="mb-0">Total Laporan</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded">
                                <h4 class="text-danger"><i class="fas fa-exclamation-circle me-2"></i>{{ $totalHilang ?? '0' }}</h4>
                                <p class="mb-0">Barang Hilang</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded">
                                <h4 class="text-success"><i class="fas fa-check-circle me-2"></i>{{ $totalDitemukan ?? '0' }}</h4>
                                <p class="mb-0">Barang Ditemukan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h3 class="mb-4">Tentang Kami</h3>
                    <p>Sistem Barang Hilang & Ditemukan adalah platform yang dibuat untuk membantu masyarakat dalam menemukan barang yang hilang atau melaporkan barang yang ditemukan. Sistem ini memudahkan proses pencarian dan pengembalian barang dengan cara yang terorganisir dan efisien.</p>
                    <p>Misi kami adalah menciptakan komunitas yang saling membantu dan peduli terhadap sesama. Dengan menggunakan platform ini, Anda turut berkontribusi dalam membangun budaya gotong royong dan kejujuran.</p>
                    <p class="mb-0">Jika Anda memiliki pertanyaan atau saran, silakan hubungi kami melalui formulir kontak atau email yang tersedia di bagian bawah halaman.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection