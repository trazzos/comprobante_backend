<?php
namespace Modules\Branch\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Branch\Repositories\Interfaces;
use Modules\Branch\Repositories\Implementation;

/**
 * Class RepositoryServiceProvider
 * @package Modules\Branch\Providers
 */
class RepositoryServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app->bind(Interfaces\BranchRepositoryInterface::class, Implementation\BranchRepository::class);
    }
}
