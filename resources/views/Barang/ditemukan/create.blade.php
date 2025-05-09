@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0 fw-bold"><i class="fas fa-search-plus me-2"></i>Laporkan Barang Ditemukan</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('barang.ditemukan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama_barang" class="form-label fw-semibold">Nama Barang <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Masukkan nama barang" required>
                                @error('nama_barang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="nama_pelapor" class="form-label fw-semibold">Nama Pelapor <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-lg @error('nama_pelapor') is-invalid @enderror" id="nama_pelapor" name="nama_pelapor" value="{{ old('nama_pelapor') }}" placeholder="Masukkan nama lengkap Anda" required>
                                @error('nama_pelapor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="kontak_pelapor" class="form-label fw-semibold">Kontak <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-phone"></i></span>
                                    <input type="text" class="form-control form-control-lg @error('kontak_pelapor') is-invalid @enderror" id="kontak_pelapor" name="kontak_pelapor" value="{{ old('kontak_pelapor') }}" placeholder="Nomor telepon/WhatsApp" required>
                                </div>
                                <small class="text-muted">Nomor telepon yang bisa dihubungi</small>
                                @error('kontak_pelapor')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_ditemukan" class="form-label fw-semibold">Tanggal Ditemukan <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                    <input type="date" class="form-control form-control-lg @error('tanggal_ditemukan') is-invalid @enderror" id="tanggal_ditemukan" name="tanggal_ditemukan" value="{{ old('tanggal_ditemukan') }}" required>
                                </div>
                                @error('tanggal_ditemukan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="lokasi_ditemukan" class="form-label fw-semibold">Lokasi Ditemukan <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-map-marker-alt"></i></span>
                                <input type="text" class="form-control form-control-lg @error('lokasi_ditemukan') is-invalid @enderror" id="lokasi_ditemukan" name="lokasi_ditemukan" value="{{ old('lokasi_ditemukan') }}" placeholder="Lokasi di mana Anda menemukan barang" required>
                            </div>
                            @error('lokasi_ditemukan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="keterangan" class="form-label fw-semibold">Keterangan</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="4" placeholder="Deskripsikan barang yang ditemukan secara detail...">{{ old('keterangan') }}</textarea>
                            <small class="text-muted">Detail barang seperti warna, ukuran, merk, dll.</small>
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="gambar_barang" class="form-label fw-semibold">Gambar Barang</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-image"></i></span>
                                    <input type="file" class="form-control form-control-lg @error('gambar_barang') is-invalid @enderror" id="gambar_barang" name="gambar_barang">
                                </div>
                                <small class="text-muted">Format: jpeg, png, jpg, gif (maks: 2MB)</small>
                                @error('gambar_barang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="bukti_perjalanan" class="form-label fw-semibold">Bukti Perjalanan</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-file-image"></i></span>
                                    <input type="file" class="form-control form-control-lg @error('bukti_perjalanan') is-invalid @enderror" id="bukti_perjalanan" name="bukti_perjalanan">
                                </div>
                                <small class="text-muted">Format: jpeg, png, jpg, gif (maks: 2MB)</small>
                                @error('bukti_perjalanan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="{{ route('barang.ditemukan.index') }}" class="btn btn-secondary btn-lg px-4"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
                            <button type="submit" class="btn btn-primary btn-lg px-4"><i class="fas fa-save me-2"></i>Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
    }
    
    .btn-primary:hover {
        background-color: #2e59d9;
        border-color: #2653d4;
    }
    
    .bg-primary {
        background-color: #4e73df !important;
    }
    
    .form-control:focus {
        border-color: #4e73df;
        box-shadow: 0 0 0 0.25rem rgba(78, 115, 223, 0.25);
    }
</style>
@endsection