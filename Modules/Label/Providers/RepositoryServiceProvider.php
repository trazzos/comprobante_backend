<?php
namespace Modules\Label\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Label\Repositories\Interfaces;
use Modules\Label\Repositories\Implementation;

/**
 * Class RepositoryServiceProvider
 * @package Modules\Label\Providers
 */
class RepositoryServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(Interfaces\LabelRepositoryInterface::class, Implementation\LabelRepository::class);
    }
}
