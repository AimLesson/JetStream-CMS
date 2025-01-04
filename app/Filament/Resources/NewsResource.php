<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Filament\Resources\NewsResource\RelationManagers;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?int $navigationSort = 5; // First in the navigation


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('branch_id')
                    ->label('Branch')
                    ->relationship('branch', 'name')
                    ->searchable()
                    ->preload()
                    ->default(auth()->user()->branch_id) // Automatically select the user's branch
                    ->disabled(fn () => auth()->user()->role !== 'superadmin' && auth()->user()->role !== 'yayasan') // Disable for non-superadmin or yayasan
                    ->visible(fn () => auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan' || auth()->user()->branch_id),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->maxLength(65535),
                Forms\Components\FileUpload::make('image')
                    ->directory('news-images')
                    ->image()
                    ->maxSize(2048),
                Forms\Components\TextInput::make('author')
                    ->nullable()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_published')
                    ->label('Published')
                    ->default(false)
                    ->visible(fn () => auth()->user()->role === 'superadmin' || auth()->user()->role === 'yayasan'), // Only superadmin or yayasan can see this field
                Forms\Components\TextInput::make('youtube_link')
                    ->label('YouTube Link')
                    ->url()
                    ->placeholder('https://www.youtube.com/watch?v=...')
                    ->nullable(),
                Forms\Components\TextInput::make('instagram_link')
                    ->label('Instagram Link')
                    ->url()
                    ->placeholder('https://www.instagram.com/p/...')
                    ->nullable(),
                Forms\Components\TextInput::make('tiktok_link')
                    ->label('TikTok Link')
                    ->url()
                    ->placeholder('https://www.tiktok.com/@username/video/...')
                    ->nullable(),
            ]);
    }
    
    
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable(),
                Tables\Columns\TextColumn::make('branch.name')
                    ->label('Branch')
                    ->searchable(),
                Tables\Columns\BooleanColumn::make('is_published')->label('Published'),
                Tables\Columns\ImageColumn::make('image')->rounded(),
                Tables\Columns\TextColumn::make('author')->label('Author')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Created')->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(function ($record) {
                    $user = auth()->user();
                
                    return $user->role === 'superadmin' 
                        || $user->role === 'yayasan' 
                        || ($user->role === 'branch_manager' && $user->branch_id === $record->id);
                    }),
                Tables\Actions\Action::make('preview')
                    ->label('Preview')
                    ->url(fn ($record) => route('news.preview', ['newsId' => $record->id]))
                    ->icon('heroicon-o-eye')
                    ->openUrlInNewTab(),
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
