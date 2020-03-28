<?php
namespace Modules\Invoice\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Invoice\Repositories\Interfaces;
use Modules\Invoice\Repositories\Implementation;

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
        $this->app->bind(Interfaces\InvoiceRepositoryInterface::class, Implementation\InvoiceRepository::class);
    }
}
