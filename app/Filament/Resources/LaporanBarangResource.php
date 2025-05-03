<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LaporanBarangResource\Pages;
use App\Models\LaporanBarang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class LaporanBarangResource extends Resource
{
    protected static ?string $model = LaporanBarang::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationLabel = 'Laporan Barang';
    protected static ?string $pluralModelLabel = 'Laporan Barang';
    protected static ?string $navigationGroup = 'Manajemen Barang';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                Select::make('status')
                                    ->label('Status')
                                    ->options([
                                        'pending' => 'Pending',
                                        'terverifikasi' => 'Terverifikasi',
                                        'selesai' => 'Selesai',
                                    ])
                                    ->default('pending')
                                    ->required(),

                                TextInput::make('nama_pelapor')
                                    ->label('Nama Pelapor')
                                    ->required()
                                    ->maxLength(255),

                                TextInput::make('kontak_pelapor')
                                    ->label('Kontak Pelapor')
                                    ->required()
                                    ->tel()
                                    ->helperText('Nomor telepon atau WhatsApp')
                                    ->maxLength(20),

                                TextInput::make('lokasi_ditemukan')
                                    ->label('Lokasi Ditemukan/Hilang')
                                    ->required()
                                    ->maxLength(255),

                                DatePicker::make('tanggal_ditemukan')
                                    ->label('Tanggal Ditemukan/Hilang')
                                    ->default(now())
                                    ->required(),
                                Select::make('lokasi_pengambilan')
                                ->label('Lokasi Pengambilan')
                                    ->options([
                                        "Stasiun Bandung (BD)" => "Stasiun Bandung (BD)",
                                        "Stasiun Bogor (BOO)" => "Stasiun Bogor (BOO)",
                                        "Stasiun Cimahi (CMI)" => "Stasiun Cimahi (CMI)",
                                        "Stasiun Sukabumi (SI)" => "Stasiun Sukabumi (SI)",
                                        "Stasiun Kiaracondong (KAC)" => "Stasiun Kiaracondong (KAC)",
                                    ])->required(),
                            ]),

                        Textarea::make('keterangan')
                            ->label('Keterangan')
                            ->rows(4)
                            ->columnSpanFull()
                            ->maxLength(1000),
                        FileUpload::make('gambar_barang')
                            ->disk('public')
                            ->directory('laporan-barang/bukti')
                            ->visibility('public')
                            ->required()
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar_barang')
                    ->label('Bukti Foto')
                    ->disk('public')
                    ->square()
                    ->width(60)
                    ->height(60)
                    ->toggleable(),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'terverifikasi',
                        'primary' => 'selesai',
                    ])
                    ->formatStateUsing(function ($state) {
                        return ucfirst($state);
                    }),

                TextColumn::make('nama_pelapor')
                    ->label('Nama Pelapor')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('kontak_pelapor')
                    ->label('Kontak')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('lokasi_ditemukan')
                    ->label('Lokasi')
                    ->searchable()
                    ->toggleable()
                    ->limit(30),

                TextColumn::make('tanggal_ditemukan')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dilaporkan Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->label('Status Laporan')
                    ->options([
                        'pending' => 'Pending',
                        'terverifikasi' => 'Terverifikasi',
                        'selesai' => 'Selesai',
                    ])
                    ->multiple(),

                Filter::make('tanggal_ditemukan')
                    ->form([
                        DatePicker::make('dari_tanggal')
                            ->label('Dari Tanggal'),
                        DatePicker::make('sampai_tanggal')
                            ->label('Sampai Tanggal')
                            ->default(now()),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['dari_tanggal'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal_ditemukan', '>=', $date),
                            )
                            ->when(
                                $data['sampai_tanggal'],
                                fn (Builder $query, $date): Builder => $query->whereDate('tanggal_ditemukan', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()->label('Lihat'),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Relasi bisa ditambahkan di sini kalau ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLaporanBarangs::route('/'),
            'create' => Pages\CreateLaporanBarang::route('/create'),
            'edit' => Pages\EditLaporanBarang::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['nama_pelapor', 'kontak_pelapor', 'lokasi_ditemukan', 'keterangan'];
    }
}
