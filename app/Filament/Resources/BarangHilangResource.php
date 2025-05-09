<?php

namespace App\Filament\Resources;

use App\Models\BarangHilang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use App\Filament\Resources\BarangHilangResource\Pages;

class BarangHilangResource extends Resource
{
    protected static ?string $model = BarangHilang::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationLabel = 'Barang Hilang';
    protected static ?string $pluralModelLabel = 'Barang Hilang';
    protected static ?string $navigationGroup = 'Manajemen Barang';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('nama_barang')
                                    ->label('Nama Barang')
                                    ->required()
                                    ->maxLength(255)
                                    ->helperText('Contoh: Dompet, Kunci, dll'),
                            
                                DatePicker::make('tanggal_hilang')
                                    ->label('Tanggal Hilang')
                                    ->required()
                                    ->default(now()),

                                TextInput::make('lokasi_hilang')
                                    ->label('Lokasi Hilang')
                                    ->required()
                                    ->maxLength(255),

                                Select::make('status')
                                    ->label('Status')
                                    ->options([
                                        'pending' => 'Pending',
                                        'terverifikasi' => 'Terverifikasi',
                                        'selesai' => 'Selesai',
                                    ])
                                    ->default('pending')
                                    ->required(),

                                TextInput::make('nama_pemilik')
                                    ->label('Nama Pemilik')
                                    ->maxLength(255),

                                TextInput::make('contact')
                                    ->label('Contact')
                                    ->tel() 
                                    ->maxLength(20),

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

                        Textarea::make('deskripsi')
                            ->label('Deskripsi')
                            ->required()
                            ->maxLength(1000)
                            ->rows(4),

                        FileUpload::make('gambar_barang')
                            ->label('Gambar Barang')
                            ->image()
                            ->directory('barang-hilang')
                            ->visibility('public')
                            ->maxSize(5120) // 5MB
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                            ->helperText('Maksimal 5MB (JPG, PNG, WEBP)')
                            ->columnSpanFull()
                            ->imagePreviewHeight('250')
                            ->downloadable()
                            ->preserveFilenames()
                            ->enableOpen(),
                        
                        FileUpload::make('bukti_perjalanan')
                            ->disk('public')
                            ->directory('laporan-barang/bukti')
                            ->visibility('public')
                            ->required()
                            ->label('Bukti Perjalanan'),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar_barang')
                    ->label('Gambar')
                    ->disk('public')
                    ->width(100)
                    ->height(100)
                    ->toggleable()
                    ->square(),

                TextColumn::make('nama_barang')
                    ->label('Nama Barang')
                    ->searchable()
                    ->sortable(),

                BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'terverifikasi',
                        'primary' => 'selesai',
                    ]),

                TextColumn::make('tanggal_hilang')
                    ->label('Tanggal Hilang')
                    ->date('d M Y')
                    ->sortable(),

                TextColumn::make('lokasi_hilang')
                    ->label('Lokasi Hilang')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('nama_pemilik')
                    ->label('Nama Pemilik')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('contact')
                    ->label('Kontak')
                    ->searchable()
                    ->toggleable(),

                TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                // SelectFilter::make('status')
                //     ->options([
                //         'hilang' => 'Hilang',
                //         'ditemukan' => 'Ditemukan',
                //         'menunggu' => 'Menunggu',
                //     ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBarangHilangs::route('/'),
            'create' => Pages\CreateBarangHilang::route('/create'),
            'edit' => Pages\EditBarangHilang::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['nama_barang', 'deskripsi', 'lokasi_hilang', 'nama_pemilik', 'contact'];
    }
}