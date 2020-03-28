<?php
namespace Modules\Stage\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Stage\Repositories\Interfaces;
use Modules\Stage\Repositories\Implementation;

/**
 * Class RepositoryServiceProvider
 * @package Modules\Lti\Providers
 */
class RepositoryServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(Interfaces\StageRepositoryInterface::class, Implementation\StageRepository::class);
    }
}
