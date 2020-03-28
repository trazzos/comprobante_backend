<?php
namespace Modules\Project\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Project\Repositories\Interfaces;
use Modules\Project\Repositories\Implementation;

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
        $this->app->bind(Interfaces\ProjectRepositoryInterface::class, Implementation\ProjectRepository::class);
    }
}
