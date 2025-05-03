<?php

namespace App\Filament\Resources\BarangHilangResource\Pages;

use App\Filament\Resources\BarangHilangResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBarangHilang extends EditRecord
{
    protected static string $resource = BarangHilangResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
