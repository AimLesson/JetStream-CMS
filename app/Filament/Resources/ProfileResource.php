<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    protected static ?int $navigationSort = 3; // First in the navigation


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('company_profile')
                    ->label('Deskripsi Singkat')
                    ->nullable(),
                Forms\Components\RichEditor::make('visi')
                    ->label('Visi')
                    ->nullable(),
                Forms\Components\RichEditor::make('misi')
                    ->label('Misi')
                    ->nullable(),
                Forms\Components\FileUpload::make('logo')
                    ->label('Logo')
                    ->directory('profile-logos')
                    ->image()
                    ->maxSize(2048),
                Forms\Components\FileUpload::make('background')
                    ->label('Gambar Latar')
                    ->directory('profile-bg')
                    ->image(),
                Forms\Components\FileUpload::make('banner1')
                    ->label('Gambar 1')
                    ->directory('profile-banner1')
                    ->image()
                    ->maxSize(2048),
                Forms\Components\FileUpload::make('banner2')
                    ->label('Gambar 2')
                    ->directory('profile-banner2')
                    ->image()
                    ->maxSize(2048),
                Forms\Components\RichEditor::make('about')
                    ->label('About')
                    ->nullable(),
                Forms\Components\TextInput::make('phone')
                    ->label('Phone')
                    ->nullable()
                    ->maxLength(20),
                Forms\Components\Textarea::make('address')
                    ->label('Address')
                    ->nullable(),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('phone'),
                Tables\Columns\TextColumn::make('address')->limit(50),
                Tables\Columns\ImageColumn::make('logo')->rounded(),
                Tables\Columns\TextColumn::make('created_at')->label('Created')->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }

    public static function shouldRegisterNavigation(): bool
    {
        // Only show the menu for superadmin or yayasan
        return auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan';
    }
}
