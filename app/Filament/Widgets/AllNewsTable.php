<?php

namespace App\Filament\Widgets;

use App\Models\News;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class AllNewsTable extends BaseWidget
{
    protected static ?string $heading = 'All News';
    protected static ?int $sort = 3; // Nullable integer as required

    public function getColumnSpan(): int|string|array
    {
        return 'full'; // Span the entire width of the row
    }
    


    protected function getTableQuery(): Builder
    {
        // Query to fetch all news
        return News::query();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('title')
                ->label('Title')
                ->searchable(),
            Tables\Columns\TextColumn::make('author')
                ->label('Author')
                ->searchable(),
            Tables\Columns\BooleanColumn::make('is_published')
                ->label('Published'),
            Tables\Columns\TextColumn::make('views')
                ->label('Views')
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime(),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            Tables\Filters\Filter::make('Published')
                ->query(fn (Builder $query) => $query->where('is_published', true))
                ->label('Published News'),

            Tables\Filters\Filter::make('Unpublished')
                ->query(fn (Builder $query) => $query->where('is_published', false))
                ->label('Unpublished News'),

            Tables\Filters\Filter::make('Views > 100')
                ->query(fn (Builder $query) => $query->where('views', '>', 100))
                ->label('Popular News'),
        ];
    }

    public function getTableRecordsPerPage(): int
    {
        // Show 10 records per page
        return 10;
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\Action::make('view')
                ->label('View')
                ->icon('heroicon-o-eye')
                ->url(fn ($record) => route('news.preview', ['newsId' => $record->id]))
                ->openUrlInNewTab(),
        ];
    }
}
