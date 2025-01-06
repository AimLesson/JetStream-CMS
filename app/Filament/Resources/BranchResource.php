<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BranchResource\Pages;
use App\Filament\Resources\BranchResource\RelationManagers;
use App\Models\Branch;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BranchResource extends Resource
{
    protected static ?string $model = Branch::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?int $navigationSort = 4; // First in the navigation

    public static function getNavigationLabel(): string
    {
        return 'Sekolah';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required()->maxLength(255),
            Forms\Components\FileUpload::make('logo')->directory('logos')->image()->maxSize(2048),
            Forms\Components\RichEditor::make('company_profile')
                ->maxLength(65535)
                ->toolbarButtons(['bold', 'italic', 'strike', 'link', 'orderedList', 'unorderedList', 'heading', 'blockquote', 'codeBlock']),
            Forms\Components\RichEditor::make('about')
                ->maxLength(65535)
                ->toolbarButtons(['bold', 'italic', 'strike', 'link', 'orderedList', 'unorderedList', 'heading', 'blockquote', 'codeBlock']),
            Forms\Components\TextInput::make('phone')->tel()->maxLength(15),
            Forms\Components\Textarea::make('address')->maxLength(65535),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([Tables\Columns\TextColumn::make('name')->searchable(), Tables\Columns\TextColumn::make('phone')->searchable(), Tables\Columns\TextColumn::make('address')->limit(50), Tables\Columns\ImageColumn::make('logo')->rounded(), Tables\Columns\TextColumn::make('created_at')->dateTime(), Tables\Columns\TextColumn::make('updated_at')->dateTime()])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(function ($record) {
                    return auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan' || auth()->user()->branch_id === $record->id;
                }),
                Tables\Actions\DeleteAction::make()
                ->visible(fn () => auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan'),

            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListBranches::route('/'),
            'create' => Pages\CreateBranch::route('/create'),
            'edit' => Pages\EditBranch::route('/{record}/edit'),
        ];
    }
}
