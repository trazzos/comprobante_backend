<?php

namespace App\Providers;

use App\Services\SortService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class SortServiceProvider extends ServiceProvider {
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
        App::bind('Sort', function() {
            return App::make(SortService::class);
        });
    }
}
