<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Filament\Pages\NewsPreview;

Route::get('/admin/news/preview/{newsId}', NewsPreview::class)->name('news.preview');

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\NewsController;

// Route to show a single news item
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');

use App\Http\Controllers\PageController;

Route::get('/about', [PageController::class, 'about'])->name('about');

use App\Http\Controllers\BranchController;

Route::get('/branches/{id}', [BranchController::class, 'show'])->name('branches.show');
Route::get('/branches/{id}/about', [BranchController::class, 'about'])->name('branches.about');
