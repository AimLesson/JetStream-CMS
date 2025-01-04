<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Filament\Pages\NewsPreview;

Route::get('/admin/news/preview/{newsId}', NewsPreview::class)->name('news.preview');

