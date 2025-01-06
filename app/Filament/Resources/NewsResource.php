<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\News;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\NewsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\NewsResource\RelationManagers;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?int $navigationSort = 5; // First in the navigation

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('branch_id')
                ->label('Branch')
                ->relationship('branch', 'name')
                ->searchable()
                ->preload(),
            Forms\Components\TextInput::make('title')->required()->maxLength(255),
            Forms\Components\RichEditor::make('content')->required()->maxLength(65535),
            Forms\Components\FileUpload::make('image')->directory('news-images')->image()->maxSize(2048),
            Forms\Components\TextInput::make('author')->nullable()->maxLength(255),
            Forms\Components\TextInput::make('youtube_link')->label('YouTube Link')->url()->placeholder('https://www.youtube.com/watch?v=...')->nullable(),
            Forms\Components\TextInput::make('instagram_link')->label('Instagram Link')->url()->placeholder('https://www.instagram.com/p/...')->nullable(),
            Forms\Components\TextInput::make('tiktok_link')->label('TikTok Link')->url()->placeholder('https://www.tiktok.com/@username/video/...')->nullable(),
            Forms\Components\Toggle::make('is_published')->label('Published')->default(false)->visible(fn() => auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan' || auth()->user()->role === 'kepala_sekolah'), // Only superadmin or yayasan can see this field
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('branch.name')->label('Branch')->searchable(),
                Tables\Columns\BooleanColumn::make('is_published')
                    ->label('Published')
                    ->trueIcon('heroicon-o-check-circle') // Icon for true status
                    ->falseIcon('heroicon-o-x-circle')   // Icon for false status
                    ->trueColor('success')              // Green color for true status
                    ->falseColor('danger')              // Red color for false status
                    ->sortable(), // Optionally allow sorting by this column
                Tables\Columns\ImageColumn::make('image')->rounded(),
                Tables\Columns\TextColumn::make('author')->label('Author')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Created')->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(
                    fn($record) => auth()->user()->role === 'superadmin' 
                        || auth()->user()->role === 'yayasan' 
                        || auth()->user()->branch_id === $record->branch_id,
                ),
                Tables\Actions\Action::make('preview')
                    ->label('Preview')
                    ->url(fn($record) => route('news.preview', ['newsId' => $record->id]))
                    ->icon('heroicon-o-eye')
                    ->openUrlInNewTab(),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn() => auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan'),
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
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }

    public static function beforeSave($record, $data): void
    {
        if (isset($data['is_published']) && auth()->user()->role !== 'superadmin' && auth()->user()->role !== 'yayasan') {
            abort(403, 'You are not authorized to publish/unpublish news.');
        }
    }

    public static function getEloquentQuery(): Builder
    {
        $user = auth()->user();

        if ($user->role === 'superadmin' || $user->role === 'yayasan') {
            // Superadmin and Yayasan can access all news
            return parent::getEloquentQuery();
        }

        // Restrict other roles to only their branch's news
        return parent::getEloquentQuery()->where('branch_id', $user->branch_id);
    }
}
