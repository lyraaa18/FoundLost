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
                  ->orWhere('keterangan', 'like', "%{$search}%")
                  ->orWhere('nama_barang', 'like', "%{$search}%");

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
            'nama_barang' => 'required|string|max:255',
            'nama_pelapor' => 'required|string|max:255',
            'kontak_pelapor' => 'required|string|max:255',
            'lokasi_ditemukan' => 'required|string|max:255',
            'tanggal_ditemukan' => 'required|date',
            'keterangan' => 'nullable|string',
            'gambar_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bukti_perjalanan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $validated['status'] = 'pending';
        
        if ($request->hasFile('gambar_barang')) {
            // Buat nama file yang unik dengan timestamp
            $filename = time() . '_' . $request->file('gambar_barang')->getClientOriginalName();
            // Simpan file dengan nama yang unik
            $path = $request->file('gambar_barang')->storeAs('barang-ditemukan', $filename, 'public');
            $validated['gambar_barang'] = $path;
        }
        // if ($request->hasFile('gambar_barang')) {
        //     $path = $request->file('gambar_barang')->store('barang-ditemukan', 'public');
        //     $validated['gambar_barang'] = $path;
        // }

        if ($request->hasFile('bukti_perjalanan')) {
            // Buat nama file yang unik dengan timestamp
            $filename = time() . '_' . $request->file('bukti_perjalanan')->getClientOriginalName();
            // Simpan file dengan nama yang unik
            $path = $request->file('bukti_perjalanan')->storeAs('bukti-perjalanan', $filename, 'public');
            $validated['bukti_perjalanan'] = $path;
        }
        // if ($request->hasFile('bukti_perjalanan')) {
        //     $path = $request->file('bukti_perjalanan')->store('bukti-perjalanan', 'public');
        //     $validated['bukti_perjalanan'] = $path;
        // }

        
        LaporanBarang::create($validated);
        
        return redirect()->route('barang.ditemukan.index')
            ->with('success', 'Laporan barang ditemukan berhasil ditambahkan. Admin akan memverifikasi laporan Anda.');
    }
    
    public function show(LaporanBarang $laporanBarang)
    {
        return view('barang.ditemukan.show', compact('laporanBarang'));
    }
}