<?php
namespace Modules\Company\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Company\Repositories\Interfaces;
use Modules\Company\Repositories\Implementation;

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
        $this->app->bind(Interfaces\CompanyRepositoryInterface::class, Implementation\CompanyRepository::class);
    }
}
