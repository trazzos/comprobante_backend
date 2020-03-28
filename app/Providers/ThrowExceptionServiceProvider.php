<?php

namespace App\Providers;

use App\Services\ThrowExceptionService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class ThrowExceptionServiceProvider extends ServiceProvider {
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
        App::bind('ThrowException', function() {
            return App::make(ThrowExceptionService::class);
        });
    }
}
