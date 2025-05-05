@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-primary text-white py-3">
                    <h4 class="mb-0 fw-bold"><i class="fas fa-search-minus me-2"></i>Laporkan Barang Hilang</h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ route('barang.hilang.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="nama_pemilik" class="form-label fw-semibold">Nama Pemilik</label>
                                <input type="text" class="form-control form-control-lg @error('nama_pemilik') is-invalid @enderror" id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik') }}" placeholder="Masukkan nama pemilik">
                                @error('nama_pemilik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="contact" class="form-label fw-semibold">Kontak</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-phone"></i></span>
                                    <input type="text" class="form-control form-control-lg @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ old('contact') }}" placeholder="Nomor telepon/WhatsApp">
                                </div>
                                @error('contact')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_hilang" class="form-label fw-semibold">Tanggal Hilang <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-calendar-alt"></i></span>
                                    <input type="date" class="form-control form-control-lg @error('tanggal_hilang') is-invalid @enderror" id="tanggal_hilang" name="tanggal_hilang" value="{{ old('tanggal_hilang') }}" required>
                                </div>
                                @error('tanggal_hilang')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="lokasi_hilang" class="form-label fw-semibold">Lokasi Hilang <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <span class="input-group-text bg-light"><i class="fas fa-map-marker-alt"></i></span>
                                <input type="text" class="form-control form-control-lg @error('lokasi_hilang') is-invalid @enderror" id="lokasi_hilang" name="lokasi_hilang" value="{{ old('lokasi_hilang') }}" placeholder="Masukkan lokasi kehilangan" required>
                            </div>
                            @error('lokasi_hilang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" placeholder="Deskripsi detail mengenai barang yang hilang (warna, merek, ciri khusus, dll)">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
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
                            <a href="{{ route('barang.hilang.index') }}" class="btn btn-secondary btn-lg px-4"><i class="fas fa-arrow-left me-2"></i>Kembali</a>
                            <button type="submit" class="btn btn-primary btn-lg px-4"><i class="fas fa-save me-2"></i>Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection