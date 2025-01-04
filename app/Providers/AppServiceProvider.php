<?php

namespace App\Providers;

use App\Models\Branch;
use App\Models\Profile;
use Filament\Facades\Filament;
use Filament\Support\Assets\Css;
use Illuminate\Support\ServiceProvider;
use Filament\Support\Facades\FilamentAsset;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    public function boot()
    {
        view()->composer('*', function ($view) {
            $profile = Profile::first();
            $view->with('profile', $profile);
        });

        view()->composer('layouts.app', function ($view) {
            $branches = Branch::all(); // Fetch all branches
            $view->with('branches', $branches);
        });

        view()->composer('layouts.branch', function ($view) {
            $branches = Branch::all(); // Fetch all branches
            $view->with('branches', $branches);
        });
        // FilamentAsset::register([
        //     Css::make('css/filament-login.css'), // Use the relative path within the public directory
        // ]);
    }
}
