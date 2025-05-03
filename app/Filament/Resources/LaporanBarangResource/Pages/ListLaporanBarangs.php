<?php

namespace App\Filament\Resources\LaporanBarangResource\Pages;

use App\Filament\Resources\LaporanBarangResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLaporanBarangs extends ListRecords
{
    protected static string $resource = LaporanBarangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
