<?php

namespace App\Filament\Pages;

use App\Models\News;
use Filament\Pages\Page;

class NewsPreview extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-eye';

    public News $news;

    public static function shouldRegisterNavigation(): bool
    {
        return false; // Do not display in the navigation menu
    }

    public function mount(int $newsId): void
    {
        $this->news = News::findOrFail($newsId); // Fetch the news item by ID
    }

    public function getTitle(): string
    {
        return 'Preview: ' . $this->news->title; // Set the page title dynamically
    }
    

    protected static string $view = 'filament.pages.news-preview';
}
