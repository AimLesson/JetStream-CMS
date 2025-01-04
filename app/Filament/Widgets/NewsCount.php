<?php

namespace App\Filament\Widgets;

use App\Models\News;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class NewsCount extends BaseWidget
{

    protected static ?int $sort = 2; // Nullable integer as required
    protected function getCards(): array
    {
        $todayCount = News::whereDate('created_at', today())->count();
        $yesterdayCount = News::whereDate('created_at', today()->subDay())->count();
        $totalNews = News::count();
        $publishedNews = News::where('is_published', true)->count();
        $unpublishedNews = News::where('is_published', false)->count();
        $totalViews = News::sum('views'); // Get the total views for all news
        $dailyViews = News::whereDate('updated_at', today())->sum('views'); // Views updated today

        return [
            Card::make('News Today', $todayCount)
                ->description('Compared to yesterday: ' . ($todayCount - $yesterdayCount))
                ->descriptionIcon($todayCount > $yesterdayCount ? 'heroicon-o-arrow-trending-up' : 'heroicon-o-arrow-trending-down')
                ->color($todayCount > $yesterdayCount ? 'success' : 'danger'),
            
            Card::make('Total News', $totalNews)
                ->description('All-time news count'),

            Card::make('Published News', $publishedNews)
                ->description('News currently published')
                ->color('success'),

            Card::make('Unpublished News', $unpublishedNews)
                ->description('News not yet published')
                ->color('warning'),
            
            Card::make('Total Views', $totalViews)
                ->description('Total views across all news items')
                ->color('primary'),
            
            Card::make('Views Today', $dailyViews)
                ->description('Views recorded today')
                ->color('info'),
        ];
    }
}
