<?php

namespace App\Filament\Widgets;

use App\Models\BarangHilang;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Carbon\Carbon;  // Import Carbon

class BarangDitemukanChart extends ChartWidget
{
    protected static ?string $heading = 'Barang Ditemukan';

    protected function getData(): array
    {
        // Mengambil data trend untuk barang ditemukan
        $data = Trend::query(
            BarangHilang::where('status', 'ditemukan') // Menggunakan model BarangHilang dan status 'ditemukan'
        )
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perDay()
            ->count();

        // Menangani kemungkinan tidak ada data dengan mengisi array kosong
        $chartData = $data->map(fn (TrendValue $value) => [
            'x' => Carbon::parse($value->date)->toDateString(),  // Pastikan $value->date adalah objek Carbon
            'y' => intval($value->aggregate),     // Menghitung jumlah barang ditemukan
        ]);

        // Periksa apakah data kosong atau tidak
        if ($chartData->isEmpty()) {
            $chartData = collect([['x' => now()->toDateString(), 'y' => 0]]);
        }

        // Mengembalikan data untuk chart
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Barang Ditemukan',
                    'data' => $chartData,  // Data untuk chart
                    'borderColor' => '#28a745',  // Warna garis chart (Hijau untuk ditemukan)
                    'backgroundColor' => 'rgba(40, 167, 69, 0.2)',  // Warna latar belakang chart
                ],
            ],
            'labels' => $chartData->pluck('x'),  // Menampilkan label tanggal
        ];
    }

    protected function getType(): string
    {
        return 'line';  // Tipe chart: garis
    }
}
