<?php
namespace Modules\Announcement\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Announcement\Repositories\Interfaces;
use Modules\Announcement\Repositories\Implementation;

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
        $this->app->bind(Interfaces\AnnouncementRepositoryInterface::class, Implementation\AnnouncementRepository::class);
    }
}
