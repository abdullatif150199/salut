<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('settings')) {
            $setting = Setting::first();
            View::share('setting', $setting);
        } else {

            View::share('setting', null);
        }
    }
}
