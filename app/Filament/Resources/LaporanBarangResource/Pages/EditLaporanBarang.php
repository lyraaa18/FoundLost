<?php

namespace App\Filament\Resources\LaporanBarangResource\Pages;

use App\Filament\Resources\LaporanBarangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLaporanBarang extends EditRecord
{
    protected static string $resource = LaporanBarangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
