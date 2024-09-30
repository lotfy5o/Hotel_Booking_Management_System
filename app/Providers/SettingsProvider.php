<?php

namespace App\Providers;

use App\Models\Amenity;
use App\Models\Service;
use App\Models\Setting;
// use Illuminate\View\View;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class SettingsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (Schema::hasTable('settings')) {

            $settings = Setting::findOrFail(1);
            View::share('settings', $settings);
        }
        if (Schema::hasTable('amenities')) {

            $amenities = Amenity::all();
            View::share('amenities', $amenities);
        }
        if (Schema::hasTable('services')) {

            $services = Service::all();
            View::share('services', $services);
        }
    }
}
