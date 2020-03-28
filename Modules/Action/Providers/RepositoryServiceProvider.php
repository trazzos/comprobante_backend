<?php
namespace Modules\Action\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Action\Repositories\Interfaces;
use Modules\Action\Repositories\Implementation;

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
        $this->app->bind(Interfaces\ActionRepositoryInterface::class, Implementation\ActionRepository::class);
    }
}
