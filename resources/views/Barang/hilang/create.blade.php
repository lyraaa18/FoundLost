@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Laporkan Barang Hilang</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('barang.hilang.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nama_barang" class="form-label">Nama Barang <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" name="nama_barang" value="{{ old('nama_barang') }}" required>
                            @error('nama_barang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                            <input type="text" class="form-control @error('nama_pemilik') is-invalid @enderror" id="nama_pemilik" name="nama_pemilik" value="{{ old('nama_pemilik') }}">
                            @error('nama_pemilik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="contact" class="form-label">Kontak</label>
                            <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ old('contact') }}">
                            @error('contact')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="tanggal_hilang" class="form-label">Tanggal Hilang <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('tanggal_hilang') is-invalid @enderror" id="tanggal_hilang" name="tanggal_hilang" value="{{ old('tanggal_hilang') }}" required>
                            @error('tanggal_hilang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="lokasi_hilang" class="form-label">Lokasi Hilang <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('lokasi_hilang') is-invalid @enderror" id="lokasi_hilang" name="lokasi_hilang" value="{{ old('lokasi_hilang') }}" required>
                            @error('lokasi_hilang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="gambar_barang" class="form-label">Gambar Barang</label>
                            <input type="file" class="form-control @error('gambar_barang') is-invalid @enderror" id="gambar_barang" name="gambar_barang">
                            <small class="text-muted">Upload gambar dengan format: jpeg, png, jpg, gif (max: 2MB)</small>
                            @error('gambar_barang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="bukti_perjalanan" class="form-label">Bukti Perjalanan</label>
                            <input type="file" class="form-control @error('gambar_barang') is-invalid @enderror" id="gambar_barang" name="gambar_barang">
                            <small class="text-muted">Upload gambar dengan format: jpeg, png, jpg, gif (max: 2MB)</small>
                            @error('bukti_perjalanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('barang.hilang.index') }}" class="btn btn-secondary me-md-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection