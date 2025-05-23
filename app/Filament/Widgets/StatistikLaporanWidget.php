<?php

namespace App\Filament\Widgets;

use Filament\Widgets\BarChartWidget;
use App\Models\BarangHilang;
use App\Models\LaporanBarang;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Carbon\Carbon; 


class StatistikLaporanWidget extends BarChartWidget
{
    protected static ?string $heading = 'Statistik Barang Hilang & Ditemukan';
    protected static ?string $maxHeight = '500px';

    protected function getFilters(): ?array
    {
        return [
            'minggu' => 'Minggu',
            'bulan' => 'Bulan',
            'tahun' => 'Tahun',
        ];
    }

    protected function getData(): array
    {
        $filter = $this->filter; // Ambil filter yang dipilih

        // Default: tahun ini
        $start = now()->startOfYear();
        $end = now()->endOfYear();

        if ($filter === 'minggu') {
            $start = now()->startOfWeek();
            $end = now()->endOfWeek();
            $interval = 'perDay';
            $labelFormat = 'D, d M';
        } elseif ($filter === 'bulan') {
            $start = now()->startOfMonth();
            $end = now()->endOfMonth();
            $interval = 'perWeek';
            $labelFormat = 'W'; // Minggu ke-
        } else { // tahun
            $start = now()->startOfYear();
            $end = now()->endOfYear();
            $interval = 'perMonth';
            $labelFormat = 'F Y';
        }

        // Mengambil data trend untuk barang hilang
       if ($interval === 'perWeek') {
            // Agregasi per minggu manual
            $hilang = BarangHilang::whereBetween('created_at', [$start, $end])
             ->get()
             ->groupBy(function ($item) {
            return Carbon::parse($item->created_at)->format('W');
            })
            ->map(function ($group) {
            return $group->count();
            });

            $ditemukan = LaporanBarang::whereBetween('tanggal_ditemukan', [$start, $end])
            ->get()
            ->groupBy(function ($item) {
            return Carbon::parse($item->tanggal_ditemukan)->format('W');
            })
            ->map(function ($group) {
            return $group->count();
            });

        // Buat label minggu
            $weeks = [];
            $current = $start->copy()->startOfWeek();
            while ($current <= $end) {
                $weeks[] = $current->format('W');
                $current->addWeek();
            }

            $labels = collect($weeks)->map(function ($week) use ($start) {
                $date = Carbon::now()->setISODate($start->year, $week);
                return 'Minggu ke-' . $week . ' (' . $date->startOfWeek()->format('d M') . ')';
            });

            $hilangData = collect($weeks)->map(fn($w) => $hilang[$w] ?? 0);
            $ditemukanData = collect($weeks)->map(fn($w) => $ditemukan[$w] ?? 0);

          } else {
             $hilangTrend = Trend::query(
             BarangHilang::query()
             )
                ->between(
                start: $start,
                end: $end,
                )
                ->dateColumn('created_at')
                ->{$interval}()
                ->count();

            $ditemukanTrend = Trend::query(
            LaporanBarang::query()
            )
            ->between(
            start: $start,
            end: $end,
            )
            ->dateColumn('tanggal_ditemukan')
            ->{$interval}()
            ->count();
            
         $labels = $hilangTrend->pluck('date')->merge($ditemukanTrend->pluck('date'))->unique()->sort()->values();

            $hilangData = $labels->map(function ($date) use ($hilangTrend) {
                $item = $hilangTrend->firstWhere('date', $date);
                return $item ? intval($item->aggregate) : 0;
            });

            $ditemukanData = $labels->map(function ($date) use ($ditemukanTrend) {
                $item = $ditemukanTrend->firstWhere('date', $date);
                return $item ? intval($item->aggregate) : 0;
            });

          // Format label
            $labels = $labels->map(fn($date) => Carbon::parse($date)->format($labelFormat));  
        }

     return [
            'datasets' => [
                [
                    'label' => 'Barang Hilang',
                    'data' => $hilangData,
                    'borderColor' => '#FF0000',
                    'backgroundColor' => 'rgba(255, 0, 0, 0.2)',
                ],
                [
                    'label' => 'Barang Ditemukan',
                    'data' => $ditemukanData,
                    'borderColor' => '#007bff',
                    'backgroundColor' => 'rgba(0, 123, 255, 0.2)',
                ],
            ],
            'labels' => $labels,
        ];
    }
}

