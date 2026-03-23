<?php

namespace App\Providers;

use App\Models\SiteSettings;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Share site settings with all views
        View::composer('*', function ($view) {
            if (!isset($view->getData()['settings'])) {
                try {
                    $view->with('settings', SiteSettings::global());
                } catch (\Exception $e) {
                    $view->with('settings', new SiteSettings());
                }
            }
        });
    }
}
