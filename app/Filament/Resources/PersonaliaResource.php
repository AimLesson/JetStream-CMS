<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PersonaliaResource\Pages;
use App\Filament\Resources\PersonaliaResource\RelationManagers;
use App\Models\Personalia;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PersonaliaResource extends Resource
{
    protected static ?string $model = Personalia::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('branch_id')
                    ->label('Branch')
                    ->relationship('branch', 'name')
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('name')->required()->maxLength(255)->label('Nama Pegawai'),
                Forms\Components\Select::make('title')
                    ->options([
                        'Kepala Sekolah' => 'Kepala Sekolah',
                        'Wakil Kepala Sekolah'=> 'Wakil Kepala Sekolah',
                        'Guru' => 'Guru',
                        'Staff' => 'Staff',
                    ])
                    ->required(),
                Forms\Components\FileUpload::make('profile_picture')->directory('profile-images')->image()->maxSize(2048),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('profile_picture')->rounded(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('branch.name')->label('Branch')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPersonalias::route('/'),
            'create' => Pages\CreatePersonalia::route('/create'),
            'edit' => Pages\EditPersonalia::route('/{record}/edit'),
        ];
    }
}
