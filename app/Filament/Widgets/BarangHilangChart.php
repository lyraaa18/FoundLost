<?php

namespace App\Filament\Widgets;

use App\Models\BarangHilang;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Carbon\Carbon;  // Import Carbon

class BarangHilangChart extends ChartWidget
{
    protected static ?string $heading = 'Barang Hilang';

    protected function getData(): array
    {
        // Mengambil data trend untuk barang hilang
        $data = Trend::query(
            BarangHilang::where('status', 'hilang') // Menggunakan model BarangHilang
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
            'y' => intval($value->aggregate),     // Menghitung jumlah barang hilang
        ]);

        // Periksa apakah data kosong atau tidak
        if ($chartData->isEmpty()) {
            $chartData = collect([['x' => now()->toDateString(), 'y' => 0]]);
        }

        // Mengembalikan data untuk chart
        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Barang Hilang',
                    'data' => $chartData,  // Data untuk chart
                    'borderColor' => '#FF0000',  // Warna garis chart
                    'backgroundColor' => 'rgba(255, 0, 0, 0.2)',  // Warna latar belakang chart
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
