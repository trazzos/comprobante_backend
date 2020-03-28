<?php

namespace App\Providers;

use App\Services\FilterService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class FilterServiceProvider extends ServiceProvider {
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        App::bind('Filter', function() {
            return App::make(FilterService::class);
        });
    }
}
