<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    private $repositories = ['Command', 'Host'];

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $repository) {
            $this->registerRepository($repository);
        }
    }

    /**
     * Register the repositories.
     *
     * @return void
     */
    private function registerRepository($repository)
    {
        $this->app->bind('App\Interfaces\\'.$repository.'Interface', 'App\Repositories\\'.$repository.'Repository');
    }
}
