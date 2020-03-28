<?php
namespace Modules\Setting\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Setting\Repositories\Interfaces;
use Modules\Setting\Repositories\Implementation;

/**
 * Class RepositoryServiceProvider
 * @package Modules\Setting\Providers
 */
class RepositoryServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(Interfaces\AwardTypeRepositoryInterface::class, Implementation\AwardTypeRepository::class);
    }
}
