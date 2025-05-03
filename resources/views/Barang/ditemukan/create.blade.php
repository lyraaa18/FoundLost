@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Laporkan Barang Ditemukan</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('barang.ditemukan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="nama_pelapor" class="form-label">Nama Pelapor <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama_pelapor') is-invalid @enderror" id="nama_pelapor" name="nama_pelapor" value="{{ old('nama_pelapor') }}" required>
                            @error('nama_pelapor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="kontak_pelapor" class="form-label">Kontak Pelapor <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('kontak_pelapor') is-invalid @enderror" id="kontak_pelapor" name="kontak_pelapor" value="{{ old('kontak_pelapor') }}" required>
                            <small class="text-muted">Nomor telepon atau email yang bisa dihubungi</small>
                            @error('kontak_pelapor')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="lokasi_ditemukan" class="form-label">Lokasi Ditemukan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('lokasi_ditemukan') is-invalid @enderror" id="lokasi_ditemukan" name="lokasi_ditemukan" value="{{ old('lokasi_ditemukan') }}" required>
                            @error('lokasi_ditemukan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="tanggal_ditemukan" class="form-label">Tanggal Ditemukan <span class="text-danger">*</span></label>
                            <input type="date" class="form-control @error('tanggal_ditemukan') is-invalid @enderror" id="tanggal_ditemukan" name="tanggal_ditemukan" value="{{ old('tanggal_ditemukan') }}" required>
                            @error('tanggal_ditemukan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3" placeholder="Deskripsikan barang yang ditemukan...">{{ old('keterangan') }}</textarea>
                            <small class="text-muted">Detail barang seperti warna, ukuran, merk, dll.</small>
                            @error('keterangan')
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
                        
                        <!-- <div class="alert alert-info mt-4">
                            <p class="mb-0">Jika Anda menemukan barang, harap mengisi formulir berikut untuk melaporkan barang yang ditemukan. Setelah itu barang yang ditemukan kepada admin di lokasi berikut:</p>
                            <p class="mb-0"><strong>Nama Admin:</strong> John Doe</p>
                            <p class="mb-0"><strong>Kontak Admin:</strong> 0812-3456-7890</p>
                            <p class="mb-0"><strong>Lokasi Penyimpanan Barang Hilang:</strong> Kantor Dinas Kehilangan Barang, Jalan Merdeka No. 123</p>
                        </div> -->
                        
                        
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('barang.ditemukan.index') }}" class="btn btn-secondary me-md-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection