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
        $query = BarangHilang::query()->where('status', 'terverifikasi');
        // $query = BarangHilang::query();
        
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
            'lokasi_pengambilan' => 'nullable|string|max:255',
            'bukti_perjalanan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated['status'] = 'pending';
        
        if ($request->hasFile('gambar_barang')) {
            $path = $request->file('gambar_barang')->store('barang-hilang', 'public');
            $validated['gambar_barang'] = $path;
        }

        if ($request->hasFile('bukti_perjalanan')) {
            // Buat nama file yang unik dengan timestamp
            $filename = time() . '_' . $request->file('bukti_perjalanan')->getClientOriginalName();
            // Simpan file dengan nama yang unik
            $path = $request->file('bukti_perjalanan')->storeAs('bukti-perjalanan', $filename, 'public');
            $validated['bukti_perjalanan'] = $path;
        }
        
        BarangHilang::create($validated);
        
        return redirect()->route('barang.hilang.index')
            ->with('success', 'Laporan barang hilang berhasil ditambahkan');
    }
    
    public function show(BarangHilang $barangHilang)
    {
        return view('barang.hilang.show', compact('barangHilang'));
    }

    public function exportPdf()
    {
        $dataHilang = BarangHilang::all();
        $dataDitemukan = LaporanBarang::all();
        $pdf = \PDF::loadView('filament.pages.riwayat-barang-pdf', [
        'dataHilang' => $dataHilang,
        'dataDitemukan' => $dataDitemukan,
    ]);
        return $pdf->download('riwayat-barang.pdf');
    }
}