<?php

namespace App\Http\Controllers;

use App\Models\LaporanBarang;
use App\Models\BarangHilang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanBarangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $query = LaporanBarang::query()->where('status', 'terverifikasi');
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('lokasi_ditemukan', 'like', "%{$search}%")
                  ->orWhere('keterangan', 'like', "%{$search}%");
            });
        }
        
        $barangDitemukan = $query->latest()->paginate(10);
        
        return view('barang.ditemukan.index', compact('barangDitemukan', 'search'));
    }
    
    public function create()
    {
        return view('barang.ditemukan.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pelapor' => 'required|string|max:255',
            'kontak_pelapor' => 'required|string|max:255',
            'lokasi_ditemukan' => 'required|string|max:255',
            'tanggal_ditemukan' => 'required|date',
            'keterangan' => 'nullable|string',
            'gambar_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($request->hasFile('gambar_barang')) {
            $path = $request->file('gambar_barang')->store('barang-ditemukan', 'public');
            $validated['gambar_barang'] = $path;
        }
        
        LaporanBarang::create($validated);
        
        return redirect()->route('barang.ditemukan.index')
            ->with('success', 'Laporan barang ditemukan berhasil ditambahkan. Admin akan memverifikasi laporan Anda.');
    }
    
    public function show(LaporanBarang $laporanBarang)
    {
        return view('barang.ditemukan.show', compact('laporanBarang'));
    }
}