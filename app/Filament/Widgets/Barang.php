<?php

namespace App\Filament\Widgets;

use App\Models\BarangHilang;
use App\Models\LaporanBarang;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class Barang extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            // Menghitung jumlah barang hilang berdasarkan status 'hilang'
            Stat::make('Total Barang Hilang', BarangHilang::count())
                ->label('Total Barang Hilang')
                ->color('danger'), // Warna merah untuk barang hilang

            // Menghitung jumlah barang ditemukan berdasarkan status 'ditemukan'
            Stat::make('Total Barang Ditemukan', LaporanBarang::count())
                ->label('Total Barang Ditemukan')
                ->color('success'), // Warna hijau untuk barang ditemukan

            // Anda bisa menambahkan statistik lainnya di sini jika diperlukan
        ];
    }
}
