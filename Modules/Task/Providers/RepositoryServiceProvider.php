<?php

namespace Modules\Task\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Task\Repositories\Interfaces;
use Modules\Task\Repositories\Implementation;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(){
        $this->app->bind(Interfaces\TaskRepositoryInterface::class,Implementation\TaskRepository::class);
    }
}
