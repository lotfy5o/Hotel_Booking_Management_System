<?php

namespace App\Providers;

use App\Models\Amenity;
use App\Models\Service;
use App\Models\Setting;
// use Illuminate\View\View;
use Illuminate\Support\Facades\View;
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
        $settings = Setting::findOrFail(1);
        $amenities = Amenity::all();
        $services = Service::all();
        View::share('settings', $settings);
        View::share('amenities', $amenities);
        View::share('services', $services);
    }
}
