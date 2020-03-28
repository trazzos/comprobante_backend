<?php
namespace Modules\AnnouncementType\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\AnnouncementType\Repositories\Interfaces;
use Modules\AnnouncementType\Repositories\Implementation;

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
        $this->app->bind(Interfaces\AnnouncementTypeRepositoryInterface::class, Implementation\AnnouncementTypeRepository::class);
    }
}
