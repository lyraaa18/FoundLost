<?php

namespace App\Http\Controllers;

use App\Models\BarangHilang;
use App\Models\LaporanBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangHilangController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $query = BarangHilang::query();
        
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_barang', 'like', "%{$search}%")
                  ->orWhere('deskripsi', 'like', "%{$search}%")
                  ->orWhere('lokasi_hilang', 'like', "%{$search}%");
            });
        }
        
        $barangHilang = $query->latest()->paginate(10);
        
        return view('barang.hilang.index', compact('barangHilang', 'search'));
    }
    
    public function create()
    {
        return view('barang.hilang.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'nama_pemilik' => 'nullable|string|max:255',
            'contact' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal_hilang' => 'required|date',
            'lokasi_hilang' => 'required|string|max:255',
            'gambar_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($request->hasFile('gambar_barang')) {
            $path = $request->file('gambar_barang')->store('barang-hilang', 'public');
            $validated['gambar_barang'] = $path;
        }
        
        BarangHilang::create($validated);
        
        return redirect()->route('barang.hilang.index')
            ->with('success', 'Laporan barang hilang berhasil ditambahkan');
    }
    
    public function show(BarangHilang $barangHilang)
    {
        return view('barang.hilang.show', compact('barangHilang'));
    }
}